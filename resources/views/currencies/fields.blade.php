<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','minlength' => 2,'maxlength' => 20,'readonly']) !!}
</div>

<!-- Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rate', 'Rate:') !!}
    {!! Form::number('rate', null, ['class' => 'form-control','readonly','id'=>'rate']) !!}
</div>

<!-- Profit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('profit', 'Profit(%):') !!}
    {!! Form::number('profit', null, ['class' => 'form-control','min'=>'0', 'max'=>'100','step'=>'0.5','id'=>'profit','oninput'=>'calculation_final_rate()']) !!}
</div>

<!-- Final Rate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('final_rate', 'Final Rate:') !!}
    {!! Form::number('final_rate', null, ['class' => 'form-control','readonly','id'=>'final_rate']) !!}
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
        function calculation_final_rate(){
            var rate=Number($('#rate').val());
            var profit=$('#profit').val();
            if(profit>0){
                var final_rate = ((profit/100)*rate)+rate;
                $('#final_rate').val(final_rate.toFixed(2));
            }
            
        }
</script>