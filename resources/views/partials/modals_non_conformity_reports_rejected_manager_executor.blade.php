<div class="modal fade" id="modalReject" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Reason</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Body-->
            <form method="GET"
                action="{{ route('admin.task-nonconformity-reports.rejectByManager', [$nonConformity->id]) }}"
                enctype="multipart/form-data">


                <div class="modal-body">
                    <div class="form-group {{ $errors->has('reason2') ? 'has-error' : '' }}">
                        <textarea name="reason2" id="reason2" cols="20" rows="5" class="form-control" required></textarea>
                    </div>
                    <!-- {{-- <textarea class="form-control" style="max-width: 100%" id="id_reason"></textarea> --}} -->
                </div>

                <!--Footer        -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
