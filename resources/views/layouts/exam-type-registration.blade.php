@extends('layouts.base')

@section('db-content')
<div class="d-flex justify-content-md-center align-items-center h-100 mt-5 mb-5">
    <div class="container-fluid font-regular form-wrap">
        <div class="row">
            <div class="col-md-10 flex-column d-flex">
                <h1 class="font-regular font-40">Create Exam Item</h1>
            </div>
            <div class="col-md-2 flex-column d-flex pull-right">
                <h1 class="font-regular font-16 text-right"><a href="/exam_type/list">View Table</a></h1>
            </div>
        </div>

        <form method="post" action="/exam_type/save">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ count($exam) ? $exam[0]->id : 0 }}" />
            <input type="hidden" name="_method" value="{{ count($exam) ? 'PUT' : 'POST' }}">
            <input type="hidden" name="choices">
            <!-- General Info -->
            <div class="row mt-5">
                <div class="col-md-12 flex-column d-flex">
                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <input type="text" name="description" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Exam Type Description" value="{{ count($exam) ? $exam[0]->description : '' }}">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="normal_values" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Normal Values" value="{{ count($exam) ? $exam[0]->normal_values : '' }}">
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4">
                                <select name="type" class="form-control-1 form-rounded form-select-1 font-16">
                                    <option hidden><span class="font-gray-3">Input Type</span></option>
                                    <option value="0" {{ count($exam) && $exam[0]->type == 0 ? 'selected' : '' }}>Input Box</option>
                                    <option value="1" {{ count($exam) && $exam[0]->type == 1 ? 'selected' : '' }}>Select Choices</option>
                                    <option value="2" {{ count($exam) && $exam[0]->type == 2 ? 'selected' : '' }}>Textarea</option>
                                </select> 
                            </div>
                            <div id="choice_list_group" class="col-md-4 {{ count($exam) && $exam[0]->type == 1 ? '' : 'hide' }}">     
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="choices_input" class="form-control-1 form-rounded form-input-1 font-16" placeholder="Add choices here">
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <ul id="choice_list">
                                            @if(count($exam) > 0 && $exam[0]->choices)
                                                @foreach(explode(",", $exam[0]->choices) as $val)
                                                    <li><span class="choice_desc">{{ $val }}</span><span class="font-9 font-red-1 ml-2 choice-remove">Remove</span></li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

            @include('partials.saveinfo')

        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).keydown(function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
    });


    $(document).ready(function() {
        $('select[name="type"]').change(function() {
            let val = $(this).val();
            $('#choice_list_group').removeClass('hide');
            
            if (val == 1) {
                $('input[name="choices"]').focus();
            } else {
                $('#choice_list_group').addClass('hide');
            }
        });

        $('input[name="choices_input"]').keyup(function(e) {
            if (e.keyCode == 13) {
                let val = $(this).val();

                if (val) {
                    $('#choice_list').prepend('<li><span class="choice_desc">' + val + '</span><span class="font-9 font-red-1 ml-2 choice-remove">Remove</span></li>')
                    $(this).val('');
                }
            }
        });

        $(document).on('click', '.choice-remove', function() {
            $(this).parent().remove();
        });

        $('form').submit(function(e) {
            let str = '';
            let arr = [];
            
            $('.choice_desc').each(function() {
                let val = $(this).html();
                arr.push(val); 
            });

            if (arr.length > 0) {
                str = arr.toString();
            }

            $('input[name="choices"]').val(str);
            
            return true;
        });
    });
</script>
@stop