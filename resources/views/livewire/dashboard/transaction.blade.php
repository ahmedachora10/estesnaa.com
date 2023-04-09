 <div class="card h-100">
     <div class="card-header d-flex align-items-center justify-content-between">
         <h5 class="card-title m-0 me-2">المعاملات</h5>
         <div class="dropdown">
             <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true"
                 aria-expanded="false">
                 <i class="bx bx-dots-vertical-rounded"></i>
             </button>
             <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                 <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                 <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                 <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
             </div>
         </div>
     </div>
     <div class="card-body">
         <ul class="p-0 m-0">
             @foreach ($transactions as $transaction)
                 <li class="d-flex mb-4 pb-1">
                     <div class="avatar flex-shrink-0 me-3">
                         <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded">
                     </div>
                     <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                         <div class="me-2">
                             <small class="text-muted d-block mb-1">{{ ucfirst($transaction->payment_method) }}</small>
                             <h6 class="mb-0">استقبال الاموال</h6>
                         </div>
                         <div class="user-progress d-flex align-items-center gap-1">
                             <h6 class="mb-0">{{ $transaction->amount }}</h6>
                             <span class="text-muted">USD</span>
                         </div>
                     </div>
                 </li>
             @endforeach
         </ul>
     </div>
 </div>
