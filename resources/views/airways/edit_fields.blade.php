<!-- Name En Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_en', 'Name En:') !!}
    {!! Form::text('name_en', null, ['class' => 'form-control','minlength' => 2,'maxlength' => 50]) !!}
</div>

<!-- Name Hu Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_hu', 'Name Hu:') !!}
    {!! Form::text('name_hu', null, ['class' => 'form-control','minlength' => 2,'maxlength' => 50]) !!}
</div>

<!-- Name Sk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_sk', 'Name Sk:') !!}
    {!! Form::text('name_sk', null, ['class' => 'form-control','minlength' => 2,'maxlength' => 50]) !!}
</div>

<!-- Name De Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_de', 'Name De:') !!}
    {!! Form::text('name_de', null, ['class' => 'form-control','minlength' => 2,'maxlength' => 50]) !!}
</div>





<div class="row" style="margin:3rem 0;width:100%;">
          <button onclick="addRow()" type="button" class="btn btn-primary add_row">Add age group</button>    
            <table id="empTable" class="table table-boreder" style="border:1.5px solid gray;width:100%;">
                <tr>
                <th>Name EN</th>
                <th>Name HU</th>
                <th>Name SK</th>
                <th>Name DE</th>
                <th>Min age</th>
                <th>Max age</th>
                <th>Price</th>
                <th>Delete</th>

                </tr>
                @foreach($airways->airway_age_groups as $row)
                <tr>
                    <td><input class="form-control" type="text" name="age_group_en[]" value="{{$row->name_en}}" maxlength="50" minlength="2" required></td>
                    <td><input class="form-control" type="text" name="age_group_hu[]" value="{{$row->name_hu}}" maxlength="50" minlength="2" required></td>
                    <td><input class="form-control" type="text" name="age_group_sk[]" value="{{$row->name_sk}}" maxlength="50" minlength="2" required></td>
                    <td><input class="form-control" type="text" name="age_group_de[]" value="{{$row->name_de}}" maxlength="50" minlength="2" required></td>
                    <td><input class="form-control" type="number" name="min[]" min='0' max='100' required value="{{$row->min}}"></td>
                    <td><input class="form-control" type="number" name="max[]" min='0' max='100' required value="{{$row->max}}"></td>
                    <td><input class="form-control" type="number" name="price[]" min='0'  required value="{{$row->price}}"></td>
                    <td><button class="btn btn-danger btn-xs" onclick="removeRow(this)"><i class="fa fa-trash"></i></button></td>
                </tr>
                @endforeach
            </table>
</div>


<script>
//var d=new Date;
//document.getElementById('barcode').setAttribute('value','Br'+d.getTime())

    // function to add new row.
    function addRow() {
        
        var empTab = document.getElementById('empTable');

        var rowCnt = empTab.rows.length;    // get the number of rows.
        var tr = empTab.insertRow(rowCnt); // table row.

        for (var c = 0; c < 8; c++) {
            var td = document.createElement('td');          // TABLE DEFINITION.
            td = tr.insertCell(c);

            if (c == 7) {   // if its the first column of the table.
                // add a button control.
                var button = document.createElement('button');
                var icon = document.createElement('i');
                icon.setAttribute('class', 'fa fa-trash');
                button.setAttribute('type', 'button');
                button.setAttribute('class', 'btn btn-danger btn-xs');
                button.setAttribute('onclick', 'removeRow(this)');
                td.appendChild(button).appendChild(icon);
                
            } else if(c == 6){




                var ele = document.createElement('input');
                ele.setAttribute('type', 'number');
                ele.setAttribute('name', 'price[]');
                ele.setAttribute('value', '');
                ele.setAttribute('step', '.5');
                ele.setAttribute('min', '0');
                ele.setAttribute('required', 'required');
                ele.classList.add('form-control');
                td.appendChild(ele);
            }else if(c == 5){


                var ele = document.createElement('input');
                ele.setAttribute('type', 'number');
                ele.setAttribute('name', 'max[]');
                ele.setAttribute('value', '');
                ele.setAttribute('max', '100');
                ele.setAttribute('min', '0');
                ele.setAttribute('step', '1');
                ele.setAttribute('required', 'required');
                ele.classList.add('form-control');
                td.appendChild(ele);
            }else if(c == 4){



                var ele = document.createElement('input');
                ele.setAttribute('type', 'number');
                ele.setAttribute('name', 'min[]');
                ele.setAttribute('value', '');
                ele.setAttribute('max', '100');
                ele.setAttribute('min', '0');
                ele.setAttribute('step', '1');
                ele.setAttribute('required', 'required');
                ele.classList.add('form-control');
                td.appendChild(ele);
            }else if(c == 3){
                var ele = document.createElement('input');
                ele.setAttribute('type', 'text');
                ele.setAttribute('name', 'age_group_de[]');
                ele.setAttribute('value', '');
                ele.setAttribute('maxlength', '50');
                ele.setAttribute('minlength', '2');
                ele.setAttribute('required', 'required');
                ele.classList.add('form-control');
                td.appendChild(ele);
            }else if(c == 2){
                var ele = document.createElement('input');
                ele.setAttribute('type', 'text');
                ele.setAttribute('name', 'age_group_sk[]');
                ele.setAttribute('value', '');
                ele.setAttribute('maxlength', '50');
                ele.setAttribute('minlength', '2');
                ele.setAttribute('required', 'required');
                ele.classList.add('form-control');
                td.appendChild(ele);
            }else if(c == 1){
                var ele = document.createElement('input');
                ele.setAttribute('type', 'text');
                ele.setAttribute('name', 'age_group_hu[]');
                ele.setAttribute('value', '');
                ele.setAttribute('maxlength', '50');
                ele.setAttribute('minlength', '2');
                ele.setAttribute('required', 'required');
                ele.classList.add('form-control');
                td.appendChild(ele);
            }else if(c == 0){
                var ele = document.createElement('input');
                ele.setAttribute('type', 'text');
                ele.setAttribute('name', 'age_group_en[]');
                ele.setAttribute('value', '');
                ele.setAttribute('maxlength', '50');
                ele.setAttribute('minlength', '2');
                ele.setAttribute('required', 'required');
                ele.classList.add('form-control');
                td.appendChild(ele);
            }

        }
        $('.searchable').select2();
    }

    // function to delete a row.
    function removeRow(oButton) {
        var empTab = document.getElementById('empTable');
        empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // buttton -> td -> tr
    }

    function calc(){
        var price_arr=document.getElementsByClassName('price')
        var cost_arr=document.getElementsByClassName('cost')
        var purchsepric_arr=document.getElementsByClassName('purchsepric')

        for(i=0;i<price_arr.length;i++){
            purchsepric_arr[i].value=Number(price_arr[i].value) + Number((price_arr[i].value * (cost_arr[i].value/100)))
        }

    }
    </script>