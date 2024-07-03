@extends('admin_layout.master')
@section('content')
<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content d-flex justify-content-between">
                            <h4 class="nk-block-title">FAQs</h4>
                            <button class="btn btn-primary" id="addnew">Add New</button>
                        </div>
                        <div class="nk-block-des text-soft">
                            <p>total 2,595 Faqs.</p>
                        </div>
                    </div>
                    <div class="card card-bordered card-preview d-none" id="addnewcard">
                        <div class="card-inner">
                            <div class="preview-block">
                                <div class="d-flex justify-content-between">
                                    <span class="preview-title-lg overline-title">Add Faqs</span>
                                    <span class="close"><span class="icon ni ni-cross"></span></span>
                                </div>
                                <div class="row gy-4">
                                    <div class="col-sm-12">
                                        <form action="{{ url('admin-dashboard/faq-add')}}" method="POST" id="form-data" class="gy-3 form-settings" >
                                            @csrf
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="question">Question</label>
                                                        <span class="form-note">Most asked Questions.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <textarea style="min-height: 60px" class="form-control" id="question" name="question" placeholder="">what your team do for us? </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row g-3 align-center">
                                                <div class="col-lg-5">
                                                    <div class="form-group">
                                                        <label class="form-label" for="description">Description</label>
                                                        <span class="form-note">Describe your Detail.</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="form-group">
                                                        <div class="form-control-wrap">
                                                            <textarea class="form-control " id="description" name="description" placeholder="Lorem ipsum....."> </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary add" id="add"><span
                                                        id="button_value">Save</span></button>
                                                <button type="button" class="btn btn-primary  add-new d-none" id="add_new"><span>Add
                                                        New</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        let editor;
    
        $('.edit-faq').on('click', function() {
            var dataId = $(this).data('id');
            getdata(dataId);
        });

        function getdata(dataId) {
            $.ajax({
                url: "{{ url('admin-dashboard/faq-record') }}" + "/" + dataId,
                type: 'GET',
                success: function(data) {
                    $('#addnewcard').removeClass('d-none');
                    $(this).hide();
                    $('#id').val(data.id);
                    $('#question').val(data.question);

                    // Initialize CKEditor
                    if (!editor) {
                        editor = ClassicEditor.create(document.querySelector('#answer'));
                    }
                    editor.then(editorInstance => {
                        editorInstance.setData(data.answer);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error:", error);
                }
            });
        }

        $('#addnew').click(function() {
            $('#addnewcard').removeClass('d-none');
            $(this).hide();
            if (!editor) {
                editor = ClassicEditor.create(document.querySelector('#answer'));
            }
            
        });

        $('.close').click(function() {
            $('#addnewcard').addClass('d-none');
            $('#addnew').show();
            $('#id').val('');
            $('#question').val('');
            if (editor) {
                editor.then((editorInstance) => {
                editorInstance.setData('');
                });
            }
        });

        $('#order').on( 'input',function(){
            var orderNumber = $(this).val();
            $.ajax({
                url: "{{ url('admin-dashboard/check-order') }}" + "/" + orderNumber,
                type: 'GET',
                success: function(response) {
                    if(response.data == true){
                    $('#order_error').text('this order is already set');
                    $('#add').attr('type','button');
                    } else {
                        $('#order_error').text('');
                        $('#add').attr('type','submit');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error:", error);
                }
            });
        });
        $("#sortable").sortable({
            update: function(event, ui) {
                var order = $(this).sortable('toArray', { attribute: 'data-id' });
                console.log(order);
                $.ajax({
                    url: "{{url('/update-faq-order')}}", // Change this to your endpoint
                    method: 'POST',
                    data: {
                        order: order,
                        _token: '{{ csrf_token() }}' // Include CSRF token if using Laravel
                    },
                    success: function(response) {
                        console.log('Order updated successfully.');
                    },
                    error: function(xhr) {
                        console.error('Error updating order.');
                    }
                });
            }
        });
        $("#sortable").disableSelection();
    });
</script>
@endsection