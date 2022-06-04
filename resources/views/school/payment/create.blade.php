
<div class="modal fade" id="pay_{{$admission->id}}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                <b>Payment</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="{{route('school.payment.pay',[$admission->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                    <input type="hidden" name="admissionId" value="{{$admission->id}}">
                        <input type="text" class="input-group form-control" value="{{$admission->pendingFee()}}" value="{{old('name')}}" name="amount">
                    </div>
                    
                    <button class="btn btn-primary">MAKE PAYMENT</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>