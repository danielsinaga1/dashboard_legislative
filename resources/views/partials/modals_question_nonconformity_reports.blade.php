    <div class="modal fade" id="modalQuestion" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header bg-info">
                    <h4 class="modal-title" id="myModalLabel">Quick Question</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <p><b>Apakah temuan anda merupakan insiden yang mengakibatkan
                                    adanya kerugian atau korban ?</b></p>
                            {{-- <label for="exampleInputPassword1"></label> --}}
                            {{-- <label class="form-check-label" for="exampleCheck1"><input type="radio"
                                class="form-check-input" id="exampleCheck1">
                            YA</label>

                        <label class="form-check-label" for="exampleCheck1"> <input type="radio"
                                class="form-check-input" id="exampleCheck1">
                            TIDAK</label> --}}


                            <input type="radio" id="radioCheckYes1" name="radioCheck1" value="yes">
                            <label for="radioCheckYes1">YA</label><br>
                            <input type="radio" id="radioCheckNo1" name="radioCheck1" value="no">
                            <label for="radioCheckNo1">TIDAK</label><br>


                        </div>
                        <div class="form-group">
                            {{-- <label for="exampleInputPassword2"></label> --}}
                            <p><b>Apakah temuan anda merupakan kejadian Near
                                    miss?</b></p>
                            <input type="radio" id="radioCheckYes2" name="radioCheck2" value="yes">
                            <label for="exampleCheck1">YA</label><br>

                            <input type="radio" id="radioCheckNo2" name="radioCheck2" value="no">
                            <label for="exampleCheck1">TIDAK</label><br>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="submit">Submit</button>
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            $(document).ready(function() {
                $("#submit").click(function() {

                    var $checks1 = $('input[type=radio][name="radioCheck1"]:checked');
                    var $checks2 = $('input[type=radio][name="radioCheck2"]:checked');


                    if ($checks1.val() == 'no' && $checks2.val() == 'no') {
                        console.log('Radio Yes Clicked');
                        swal({
                            position: 'top-end',
                            title: 'Redirect to Non Conformity Reports',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((value) => {
                            if (value === true) {
                                var url = "{{ route('admin.my-incident-reports.create') }}";
                                window.location.href = url;
                            }

                        })
                        var url = "{{ route('admin.nonconformity-reports.create') }}";
                        window.location.href = url;
                    } else {
                        console.log('Radio No Clicked');

                        swal({
                            title: 'Kategori ini termasuk ke dalam Incident Report',
                            type: 'info',
                            showCancelButton: false,
                            confirmButtonClass: 'btn-danger',
                            allowOutsideClick: true,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                            closeOnConfirm: false,
                            closeOnCancel: false,
                        }).then((value) => {
                            if (value === true) {
                                var url = "{{ route('admin.my-incident-reports.create') }}";
                                window.location.href = url;
                            }

                        })
                    }

                    // $checks.each(function() {

                    //     if (this.value == 'no' && this.value == 'yes') {
                    //         console.log('Radio No Clicked');
                    //         alert('belum bro');

                    //     } else if (this.value == 'yes' && this.value == 'yes') {
                    //         console.log('Radio Yes Clicked');
                    //         var url = "{{ route('admin.nonconformity-reports.create') }}";
                    //         window.location.href = url;
                    //     }

                    // });

                });
            });
        </script>

        {{-- <script>
        $(document).ready(function() {
            var $checks = $('#exampleCheck1');
            $checks.click(function() {
                $checks.not(this).prop("checked", false);
            });
        });
    </script> --}}
    @endsection
