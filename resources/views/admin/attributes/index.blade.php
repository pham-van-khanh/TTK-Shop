@extends('admin.admin-master')
@section('content-title', 'List Atribute')
@section('danh-muc', 'List Products')
@section('title', 'List Products')
@section('content')
    <div>
    </div>

    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price Old</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price New</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Danh Mục</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Active</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            <a class="btn btn-primary" style="font-size:10px" href="{{ route('product-add') }}"> Add
                                Products</a>
                        </th>
                    </tr>
                </thead>

            </table>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addQuestionModal">
            Thêm thuộc tính
        </button>


        {{-- modal --}}
        <div style="width:30%;margin-left:40%" class="modal fade" id="addQuestionModal" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tạo Thuộc Tính</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="row">
                                <br>
                                <button type="button" style="width: 100%;" id="add_att"
                                    class="btn btn-sm btn-primary">Thêm thuộc tính</button>
                                <table>
                                    <thead>
                                        <th style="width: 90%;">Kích thước</th>
                                        <th>Chọn</th>
                                    </thead>
                                    <tbody id="answer_list">
                                        <tr>
                                            <td style="width: 90%;">
                                                <input type="text" placeholder="120-300mm" class="form-control" name="size[]">
                                            </td>
                                            <td>
                                                <input type="checkbox" name="record">
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <button type="button" class="btn btn-secondary btn-sm delete-row">Xóa</button>
                            <input type="hidden" value="" id="correct_order">
                            <br>
                            <br>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('#myModal').on('shown.bs.modal', function() {
                $('#myInput').trigger('focus')
            })
        </script>
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
            integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <style>
            .clearable {
                background: #fff url(data:image/gif;base64,R0lGODlhBwAHAIAAAP///5KSkiH5BAAAAAAALAAAAAAHAAcAAAIMTICmsGrIXnLxuDMLADs=) no-repeat right -10px center;
                border: 1px solid #999;
                padding: 3px 18px 3px 4px;
                border-radius: 3px;
                transition: background 0.4s
            }

            .clearable.x {
                background-position: right 5px center
            }

            .clearable.onX {
                cursor: pointer
            }

            .clearable::-ms-clear {
                display: none;
                width: 0;
                height: 0
            }
        </style>
        <script>
            //<![CDATA[

            function tog(v) {

                return v ? 'addClass' : 'removeClass';

            }

            $(document).on('input', '.clearable', function() {

                $(this)[tog(this.value)]('x');

            }).on('mousemove', '.x', function(e) {

                $(this)[tog(this.offsetWidth - 18 < e.clientX - this.getBoundingClientRect().left)]('onX');

            }).on('touchstart click', '.onX', function(ev) {

                ev.preventDefault();

                $(this).removeClass('x onX').val('').change();

            });

            //]]>
        </script>
        <script>
            let options = {
                backdrop: false,
                keyboard: true
            };
            var addQuestionModel = new bootstrap.Modal(document.getElementById('addQuestionModal'), options)
            $("#openAddQuestionModal").click(function() {
                addQuestionModel.show();
            })

            $('#add_att').click(function() {

                $('tbody#answer_list').append(`
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="answer[]">
                            </td>
                            <td>
                                <input type="checkbox" name="record">
        
                            </td>
                        </tr>
                    `);
            })

            function correctAnswerChange(el) {
                $('tbody#answer_list').find('input[type="checkbox"]').prop('checked', false);
                $(el).prop('checked', true);
                // lấy danh sách tất cả các thẻ input:checkbox trong table
                var listCheckbox = $('tbody#answer_list').find('input[type="checkbox"]');
                $(listCheckbox).each(function(index, el) {
                    if ($(el).is(':checked')) {
                        $('#correct_order').val(index);
                    }
                })
            }
            "text/javascript" >
            // $(document).ready(function(){
            //     $(".add-row").click(function(){
            //         var name = $("#name").val();
            //         var email = $("#email").val();
            //         var markup = "";

            //         $("table tbody").append(markup);
            //     });

            // Find and remove selected table rows
            $(".delete-row").click(function() {
                $("table tbody").find('input[name="record"]').each(function() {
                    if ($(this).is(":checked")) {
                        $(this).parents("tr").remove();
                    }
                });
            });
            // });  
        </script>





    @endsection
