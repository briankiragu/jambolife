@extends('admin.layouts.master')

@section('css')
  <link href="{{ asset('css/plugins/iCheck/custom.css') }}" rel="stylesheet">
  <link href="{{ asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">
  <link href="{{ asset('css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
  <link href="{{ asset('css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">
  <link href="{{ asset('css/plugins/colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css/plugins/cropper/cropper.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css/plugins/switchery/switchery.css')}}" rel="stylesheet">
  <link href="{{ asset('css/plugins/jasny/jasny-bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css/plugins/nouslider/jquery.nouislider.css')}}" rel="stylesheet">
  <link href="{{ asset('css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">
  <link href="{{ asset('css/plugins/ionRangeSlider/ion.rangeSlider.css')}}" rel="stylesheet">
  <link href="{{ asset('css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">
  <link href="{{ asset('css/plugins/clockpicker/clockpicker.css')}}" rel="stylesheet">
  <link href="{{ asset('css/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet">
  <link href="{{ asset('css/plugins/select2/select2.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css/plugins/touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css/plugins/dualListbox/bootstrap-duallistbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css/plugins/dropzone/basic.css')}}" rel="stylesheet">
  <link href="{{ asset('css/plugins/dropzone/dropzone.css')}}" rel="stylesheet">
  <link href="{{ asset('css/plugins/codemirror/codemirror.css')}}" rel="stylesheet">
  <link href="{{ asset('css/style.css')}}" rel="stylesheet">
@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Create an event</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">
          <form method="post" class="form-horizontal" action="{{ route('events.store') }}">
            {{ csrf_field() }}

            {{-- Name --}}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <div class="col-md-6">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" class="form-control" placeholder="Enter the event name" value="{{ old('name') }}">
                  @if ($errors->has('name'))
                    <span class="help-block">
                      <strong>{{ $errors->first('name') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              {{-- Event Type ID --}}
              <div class="col-md-6">
                <label class="col-sm-2 control-label">Type</label>
                <div class="col-sm-10">
                  <select class="form-control m-b" name="event_type_id">
                    @foreach ($event_types as $event_type)
                      <option value="{{ $event_type->id }}" {{ old('event_type_id') == ($event_type->id) ? 'selected' : '' }}>
                        {{ $event_type->name }}
                      </option>
                    @endforeach
                  </select>
                  @if ($errors->has('event_type_id'))
                    <span class="help-block">
                      <strong>{{ $errors->first('event_type_id') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
            </div>
            <div class="hr-line-dashed"></div>

            {{-- Event start date --}}
            {{-- <div class="form-group{{ $errors->has('event_start') ? ' has-error' : '' }}" id="data_2">
              <label class="col-sm-2 control-label font-normal">Event Start</label>
              <div class="col-sm-10 input-group date">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" name="event_start" class="form-control" placeholder="Enter the event start date" value="{{ old('event_start') }}">
                @if ($errors->has('event_start'))
                  <span class="help-block">
                    <strong>{{ $errors->first('event_start') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('event_end') ? ' has-error' : '' }}" id="data_3">
              <label class="col-sm-2 control-label font-normal">Event End</label>
              <div class="col-sm-10 input-group date">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input type="text" name="event_end" class="form-control" placeholder="Enter the event end date" value="{{ old('event_end') }}">
                @if ($errors->has('event_end'))
                  <span class="help-block">
                    <strong>{{ $errors->first('event_end') }}</strong>
                  </span>
                @endif
              </div>
            </div> --}}
            <div class="form-group{{ $errors->has('event_end') ? ' has-error' : '' }}{{ $errors->has('event_start') ? ' has-error' : '' }}" id="data_5">
              <div class="col-sm-12">
                <label class="col-sm-1 control-label font-normal">Event Dates</label>
                <div class="col-sm-11 input-daterange input-group" id="datepicker">
                  <input type="text" class="input-sm form-control" name="event_start" value="{{ old('event_start') }}"/>
                  <span class="input-group-addon">to</span>
                  <input type="text" class="input-sm form-control" name="event_end" value="{{ old('event_end') }}" />
                </div>
                <div class="col-sm-10 col-sm-offset-2">
                  @if ($errors->has('event_start') && $errors->has('event_end'))
                    <span class="help-block">
                      <strong>{{ $errors->first('event_start') }}</strong>
                      <strong>{{ $errors->first('event_end') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
            </div>
            <div class="hr-line-dashed"></div>

            {{-- City --}}
            <div class="form-group">
              <div class="col-md-4{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">City</label>
                <div class="col-sm-9">
                  <input type="text" name="city" class="form-control" placeholder="Enter the event city" value="{{ old('city') }}">
                  @if ($errors->has('city'))
                    <span class="help-block">
                      <strong>{{ $errors->first('city') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              {{-- Street --}}
              <div class="col-md-4{{ $errors->has('street') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Street</label>
                <div class="col-sm-9">
                  <input type="text" name="street" class="form-control" placeholder="Enter the event street" value="{{ old('street') }}">
                  @if ($errors->has('street'))
                    <span class="help-block">
                      <strong>{{ $errors->first('street') }}</strong>
                    </span>
                  @endif
                </div>
              </div>

              {{-- Building --}}
              <div class="col-md-4{{ $errors->has('building') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Building</label>
                <div class="col-sm-9">
                  <input type="text" name="building" class="form-control" placeholder="Enter the event building" value="{{ old('building') }}">
                  @if ($errors->has('building'))
                    <span class="help-block">
                      <strong>{{ $errors->first('building') }}</strong>
                    </span>
                  @endif
                </div>
              </div>
            </div>
            <div class="hr-line-dashed"></div>

            {{-- Description --}}
            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
              <label class="col-sm-1 control-label">Description</label>
              <div class="col-sm-11">
                <textarea name="description" class="form-control" rows="3" placeholder="Enter the event description">{{ old('name') }}</textarea>
                @if ($errors->has('description'))
                  <span class="help-block">
                    <strong>{{ $errors->first('description') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="hr-line-dashed"></div>

            <div class="form-group{{ $errors->has('sales_close') ? ' has-error' : '' }}" id="data_1">
              <div class="col-sm-12">
                <label class="col-sm-1 control-label font-normal">Sales Close</label>
                <div class="col-sm-11 input-group date">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                  <input type="text" name="sales_close" class="form-control" placeholder="Enter the close of sales date" value="{{ old('sales_close') }}">
                </div>
                @if ($errors->has('sales_close'))
                  <span class="help-block">
                    <strong>{{ $errors->first('sales_close') }}</strong>
                  </span>
                @endif
              </div>
            </div>
            <div class="hr-line-dashed"></div>

            {{-- 230 x 230 image. --}}
            <div class="form-group">
              <div class="col-md-6{{ $errors->has('small_image') ? ' has-error' : '' }}">
                <label class="col-sm-2 control-label">Small Image</label>
                <div class="col-sm-10">
                  <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                    <div class="form-control" data-trigger="fileinput">
                      <i class="glyphicon glyphicon-file fileinput-exists"></i>
                    <span class="fileinput-filename"></span>
                    </div>
                    <span class="input-group-addon btn btn-default btn-file">
                      <span class="fileinput-new">Select file</span>
                      <span class="fileinput-exists">Change</span>
                      <input type="file" name="small_image"/>
                    </span>
                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                  </div>
                </div>
              </div>

              {{-- 700 x 400 --}}
              <div class="col-md-6{{ $errors->has('big_image') ? ' has-error' : '' }}">
                <label class="col-sm-2 control-label">Large Image</label>
                <div class="col-sm-10">
                  <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                    <div class="form-control" data-trigger="fileinput">
                      <i class="glyphicon glyphicon-file fileinput-exists"></i>
                    <span class="fileinput-filename"></span>
                    </div>
                    <span class="input-group-addon btn btn-default btn-file">
                      <span class="fileinput-new">Select file</span>
                      <span class="fileinput-exists">Change</span>
                      <input type="file" name="big_image"/>
                    </span>
                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="hr-line-dashed"></div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button class="btn btn-primary " type="submit"><i class="fa fa-check"></i>&nbsp;Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
<!-- iCheck -->
<script src="{{ asset('js/plugins/iCheck/icheck.min.js')}}"></script>
<!-- Chosen -->
<script src="{{ asset('js/plugins/chosen/chosen.jquery.js')}}"></script>
<!-- JSKnob -->
<script src="{{ asset('js/plugins/jsKnob/jquery.knob.js')}}"></script>
<!-- Input Mask-->
<script src="{{ asset('js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
<!-- Data picker -->
<script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>
<!-- NouSlider -->
<script src="{{ asset('js/plugins/nouslider/jquery.nouislider.min.js')}}"></script>
<!-- Switchery -->
<script src="{{ asset('js/plugins/switchery/switchery.js')}}"></script>
<!-- IonRangeSlider -->
<script src="{{ asset('js/plugins/ionRangeSlider/ion.rangeSlider.min.js')}}"></script>
<!-- MENU -->
<script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<!-- Color picker -->
<script src="{{ asset('js/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
<!-- Clock picker -->
<script src="{{ asset('js/plugins/clockpicker/clockpicker.js')}}"></script>
<!-- Image cropper -->
<script src="{{ asset('js/plugins/cropper/cropper.min.js')}}"></script>
<!-- Date range use moment.js same as full calendar plugin -->
<script src="{{ asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<!-- Date range picker -->
<script src="{{ asset('js/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset('js/plugins/select2/select2.full.min.js')}}"></script>
<!-- TouchSpin -->
<script src="{{ asset('js/plugins/touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<!-- Tags Input -->
<script src="{{ asset('js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
<!-- Dual Listbox -->
<script src="{{ asset('js/plugins/dualListbox/jquery.bootstrap-duallistbox.js')}}"></script>
<!-- Custom and plugin javascript -->
<script src="{{ asset('js/inspinia.js')}}"></script>
<script src="{{ asset('js/plugins/pace/pace.min.js')}}"></script>
<!-- Jasny -->
<script src="{{ asset('js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>
<!-- DROPZONE -->
<script src="{{ asset('js/plugins/dropzone/dropzone.js')}}"></script>
<!-- CodeMirror -->
<script src="{{ asset('js/plugins/codemirror/codemirror.js')}}"></script>
<script src="{{ asset('js/plugins/codemirror/mode/xml/xml.js')}}"></script>
<script>
    Dropzone.options.dropzoneForm = {
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        dictDefaultMessage: "<strong>Drop files here or click to upload. </strong></br> (This is just a demo dropzone. Selected files are not actually uploaded.)"
    };

    $(document).ready(function(){
        var editor_one = CodeMirror.fromTextArea(document.getElementById("code1"), {
            lineNumbers: true,
            matchBrackets: true
        });

        var editor_two = CodeMirror.fromTextArea(document.getElementById("code2"), {
            lineNumbers: true,
            matchBrackets: true
        });

        var editor_two = CodeMirror.fromTextArea(document.getElementById("code3"), {
            lineNumbers: true,
            matchBrackets: true
        });

        $('.tagsinput').tagsinput({
            tagClass: 'label label-primary'
        });

        var $image = $(".image-crop > img")
        $($image).cropper({
            aspectRatio: 1.618,
            preview: ".img-preview",
            done: function(data) {
                // Output the result data for cropping image.
            }
        });

        var $inputImage = $("#inputImage");
        if (window.FileReader) {
            $inputImage.change(function() {
                var fileReader = new FileReader(),
                        files = this.files,
                        file;

                if (!files.length) {
                    return;
                }

                file = files[0];

                if (/^image\/\w+$/.test(file.type)) {
                    fileReader.readAsDataURL(file);
                    fileReader.onload = function () {
                        $inputImage.val("");
                        $image.cropper("reset", true).cropper("replace", this.result);
                    };
                } else {
                    showMessage("Please choose an image file.");
                }
            });
        } else {
            $inputImage.addClass("hide");
        }

        $("#download").click(function() {
            window.open($image.cropper("getDataURL"));
        });

        $("#zoomIn").click(function() {
            $image.cropper("zoom", 0.1);
        });

        $("#zoomOut").click(function() {
            $image.cropper("zoom", -0.1);
        });

        $("#rotateLeft").click(function() {
            $image.cropper("rotate", 45);
        });

        $("#rotateRight").click(function() {
            $image.cropper("rotate", -45);
        });

        $("#setDrag").click(function() {
            $image.cropper("setDragMode", "crop");
        });

        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        $('#data_2 .input-group.date').datepicker({
            startView: 1,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: "dd/mm/yyyy"
        });

        $('#data_3 .input-group.date').datepicker({
            startView: 2,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        $('#data_4 .input-group.date').datepicker({
            minViewMode: 1,
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            todayHighlight: true
        });

        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        var elem = document.querySelector('.js-switch');
        var switchery = new Switchery(elem, { color: '#1AB394' });

        var elem_2 = document.querySelector('.js-switch_2');
        var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

        var elem_3 = document.querySelector('.js-switch_3');
        var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        $('.demo1').colorpicker();

        var divStyle = $('.back-change')[0].style;
        $('#demo_apidemo').colorpicker({
            color: divStyle.backgroundColor
        }).on('changeColor', function(ev) {
                    divStyle.backgroundColor = ev.color.toHex();
                });

        $('.clockpicker').clockpicker();

        $('input[name="daterange"]').daterangepicker();

        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

        $('#reportrange').daterangepicker({
            format: 'MM/DD/YYYY',
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2015',
            dateLimit: { days: 60 },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'right',
            drops: 'down',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-primary',
            cancelClass: 'btn-default',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Cancel',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        });

        $(".select2_demo_1").select2();
        $(".select2_demo_2").select2();
        $(".select2_demo_3").select2({
            placeholder: "Select a state",
            allowClear: true
        });


        $(".touchspin1").TouchSpin({
            buttondown_class: 'btn btn-white',
            buttonup_class: 'btn btn-white'
        });

        $(".touchspin2").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%',
            buttondown_class: 'btn btn-white',
            buttonup_class: 'btn btn-white'
        });

        $(".touchspin3").TouchSpin({
            verticalbuttons: true,
            buttondown_class: 'btn btn-white',
            buttonup_class: 'btn btn-white'
        });

        $('.dual_select').bootstrapDualListbox({
            selectorMinimalHeight: 160
        });


    });

    $('.chosen-select').chosen({width: "100%"});

    $("#ionrange_1").ionRangeSlider({
        min: 0,
        max: 5000,
        type: 'double',
        prefix: "$",
        maxPostfix: "+",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_2").ionRangeSlider({
        min: 0,
        max: 10,
        type: 'single',
        step: 0.1,
        postfix: " carats",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_3").ionRangeSlider({
        min: -50,
        max: 50,
        from: 0,
        postfix: "°",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_4").ionRangeSlider({
        values: [
            "January", "February", "March",
            "April", "May", "June",
            "July", "August", "September",
            "October", "November", "December"
        ],
        type: 'single',
        hasGrid: true
    });

    $("#ionrange_5").ionRangeSlider({
        min: 10000,
        max: 100000,
        step: 100,
        postfix: " km",
        from: 55000,
        hideMinMax: true,
        hideFromTo: false
    });

    $(".dial").knob();

    var basic_slider = document.getElementById('basic_slider');

    noUiSlider.create(basic_slider, {
        start: 40,
        behaviour: 'tap',
        connect: 'upper',
        range: {
            'min':  20,
            'max':  80
        }
    });

    var range_slider = document.getElementById('range_slider');

    noUiSlider.create(range_slider, {
        start: [ 40, 60 ],
        behaviour: 'drag',
        connect: true,
        range: {
            'min':  20,
            'max':  80
        }
    });

    var drag_fixed = document.getElementById('drag-fixed');

    noUiSlider.create(drag_fixed, {
        start: [ 40, 60 ],
        behaviour: 'drag-fixed',
        connect: true,
        range: {
            'min':  20,
            'max':  80
        }
    });
</script>
@endsection
