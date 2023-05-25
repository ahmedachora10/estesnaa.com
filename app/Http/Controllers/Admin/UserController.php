<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use FFMpeg\FFMpeg;
use FFMpeg\Format\Video\X264;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::latest()->get();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\User\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $request->validated();

        $data = [];

        if($request->avatar) {
            $image = $request->avatar;
            $data['avatar'] = str_replace('public', 'storage', $image->storeAs('public/images/users', date('Y-m-d').auth()->id().str()->random(4). '.'.$image->extension()));

        }

        $user = User::create($request->safe()->except('roles', 'avatar') + $data);

        $user->attachRole($request->roles);

        $user->update(['role' => $user->roles->first()->name]);

        if($user->role != 'user'){
            $user->profit()->create(['total' => 0]);
        }

        return redirect()->route('users.index')->with('success', trans('message.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $inventorProfilePlan = null;
        if($user->role == 'inventor') {
            if(!$user->inventorProfile) {
                $user->inventorProfile()->create([]);
            }
            $user->load('inventorProfile');
            $inventorProfilePlan = $user->inventorProfilePlan;
        }
        return view('admin.users.profile', compact('user', 'inventorProfilePlan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user->load('roles');
        $roles = Role::latest()->get();
        return view('admin.users.edit', compact('roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\User\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // dd($request->all());
        $request->validated();

        $data = [];

        if($request->avatar  != null && $request->avatar !== $user->avatar) {

            $this->removeAvatar($user->avatar);

            $image = $request->avatar;
            $data['avatar'] = str_replace('public', 'storage', $image->storeAs('public/images/users', date('Y-m-d').auth()->id().str()->random(4). '.'.$image->extension()));
        }

        if($request->password != null) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($request->safe()->except('roles', 'password', 'avatar') + $data);

        $user->syncRoles([$request->roles]);

        $user->update(['role' => $user->roles->first()->name]);

        if($user->role != 'user' && !$user->profit){
            $user->profit()->create(['total' => 0]);
        }

        return redirect()->route('users.index')->with('success', trans('message.update'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore(auth()->user())],
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'avatar' => ['nullable', 'image'],
            'phone' => ['required', 'string', Rule::unique('users', 'phone')->ignore(auth()->user())],
        ], $request->all());

        $user = User::find(auth()->id());

        if(!$user) {
            return redirect()->route('users.index');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if($request->avatar != null) {
            $this->removeAvatar($user->avatar);

            $image = $request->avatar;
            $user->avatar = str_replace('public', 'storage', $image->storeAs('public/images/users', date('Y-m-d').auth()->id().str()->random(4). '.'.$image->extension()));
        }

        if($request->password != '') {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.show',$user)->with('success', trans('message.update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $this->removeAvatar($user->avatar);

        $user->delete();

        return back()->with('success', trans('message.delete'));
    }

    private function removeAvatar($avatar)
    {
        $avatar = str_replace('storage', 'public', $avatar);

        if(Storage::exists($avatar)) {
            return Storage::delete($avatar);
        }

        return false;
    }

    public function updateInventorProfile(Request $request)
    {
        $request->validate([
            'video' => ['nullable', 'ends_with:.mp4,.mov'],
            'file' => ['nullable', 'file'],
            'avatar' => ['nullable', 'image'],
            'facebook' => ['nullable', 'string'],
            'twitter' => ['nullable', 'string'],
            'instagram' => ['nullable', 'string'],
            'whatsapp' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
        ], $request->all());

        $user = User::find(auth()->id());


        if(!$user) {
            return redirect()->back();
        }

        if($request->video != null && $request->video != $user->inventorProfile->video) {
            $this->removeAvatar($user->inventorProfile->video);
        }

        if($request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $avatar_path = str_replace('public', 'storage', $avatar->storeAs('public/images/users', date('Y-m-d').auth()->id().str()->random(4). '.'.$avatar->extension()));
            $file = ['avatar' => $avatar_path];
            $user->update($file);
        }

        $file = [];
        if($request->hasFile('file')) {
            $certificate = $request->file;
            $certificate_path = str_replace('public', 'storage', $certificate->storeAs('public/inventors/certificates', date('Y-m-d').auth()->id().str()->random(4). '.'.$certificate->extension()));
            $file = ['file' => $certificate_path, 'confirmed' => false];
        }

        $user->inventorProfile()->update($request->only(['facebook', 'whatsapp', 'instagram', 'twitter', 'description', 'video']) + $file);

        return redirect()->route('users.show', $user)->with('success', 'تم التحديث بنجاح. المرجو انتظار مراجعة البيانات من قبل الادارة');
    }

    public function uploadVideo(Request $request)
    {
        $validated = Validator::make($request->all(), ['video' => 'required|file|max:30720']); // 30MB

        if($validated->fails()) {
            return response()->json(['errors' => true, 'messages' => $validated->errors()->all()],401);
        }

        $video = $request->video;
        $uploadVideoPath = str_replace('public', 'storage', $video->storeAs('public/inventors/videos', date('Y-m-d').auth()->id().str()->random(4). '.'.$video->extension()));;
        // Path to the watermark image
        /*
        $watermark_path = asset(setting('logo'));

        //putenv('FFPROBE_BINARY=ffmpeg/fftools/ffprobe');

       // Create an FFMpeg instance
        $ffmpeg = FFMpeg::create(array(
            //'ffmpeg.binaries'  => "/home/.../usr/bin/ffmpeg/ffmpeg",
            'ffprobe.binaries' => "C:/xampp/htdocs/mostaqel/estesnaa.com/ffmpeg/fftools/ffprobe",
            //'timeout'          => 10,
            //'ffmpeg.threads'   => 12,
        ));

        // Open the video file
        $video = $ffmpeg->open(asset($uploadVideoPath));

        // Add the watermark to the video
        $video->filters()->watermark($watermark_path, [
            'position' => 'relative',
            'bottom' => 10,
            'right' => 10,
        ])->synchronize();

        // Save the modified video
        $format = new X264();
        $format->setAudioCodec("libmp3lame");
        $video->save($format, 'watermark_video.mp4');
        */
        return $uploadVideoPath;
    }
}