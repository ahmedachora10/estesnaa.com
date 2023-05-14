
function filePond(element, options = {}) {

    if (!FilePond) {
        return console.error('There is no FilePond Fount');
    }

    const pond_thumbnails = FilePond.create(element, {
        allowImagePreview: true,
        credits: false,
        ...options
    });

    return {
        setOptions: (url) => {
            pond_thumbnails.setOptions({
                server: {
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute(
                            'content')
                    }
                },
                maxFiles: 1,
                allowMultiple: false,
            });
        },

        preview: function(fullpath_image, image_name = '', name = 'image') {
            pond_thumbnails.addFile(fullpath_image);
            this.addInputImage(image_name, name);
        },

        addInputImage: (image_name, name) => {
            return document.addEventListener('FilePond:init', (e) => {
                const input_field = Array.from(document.querySelectorAll('[name=' + name + ']'))[1];
                input_field.value = image_name;
            });

        }
    }
}


/**
 *
 * @param {HTMLElement} target list of elements
 * @param {Closure} handler handling data
 * @returns Sortable Object
 */
 function sortable(/**List*/ target, handler = null, modelName) {
    const sortable_options = {
        swap: true,
        swapClass: 'highlight',
        animation: 150,
        handle: '.handle',

        onEnd: function ( /**Event*/ evt) {
            var itemEl = evt.item;

            const old = evt.oldIndex;
            const current = evt.newIndex;
            const tr = target.find('tr .target');

            // if rows has same values
            if (tr.attr('data-id') === undefined) return console.error('Please make sure you have data-id of element tr');

            if (old === current) return false;

            if (typeof handler == 'function') return handler();

            if (typeof handler != 'object') return console.error('Please Enter a Handler as a Function or Object!');

            const { url, method, response, error } = handler;


            $.ajax({
                url: url,
                method: method || 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content')
                },
                data: {
                    old_place: $(tr[old]).attr('data-id'),
                    current_place: $(tr[current]).attr('data-id'),
                    model: modelName
                },
                dataType: 'json'
            }).done(res => response(res))
                .catch(err => error(err));

        }
    };

    if (!target.length) {
        return console.error('target element is null');
    }

    if (typeof Sortable == "undefined") return console.error('There is no Sortable Object Fount');

    return target.sortable(sortable_options);
}
