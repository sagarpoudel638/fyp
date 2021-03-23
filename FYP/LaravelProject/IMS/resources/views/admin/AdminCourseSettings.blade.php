
  @extends('MasterAdmin')
  @section('container')
<div style="display:flex; margin-bottom:20px;margin-left:100px;border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); width:fit-content">
        <div style="display:inline;">
            <h3>Fee Determinaton</h3>
            <div style="display:flex; ">
                <div class="form__group field">
                            <input type="input" class="form__field" placeholder="Course Name" name="CourseName"  required />
                            <label for="name" class="form__label">Course Name</label>
                </div>
                <div class="form__group field">
                            <input type="input" class="form__field" placeholder="Set Fee" name="SetFee"  required />
                            <label for="name" class="form__label">Set Fee</label>
                </div>
                <div class="buttons" style="margin: 25px 30px 0px 30px">
                            <a href="#" class="btn effect01" target="_blank"><span>Set Fee</span></a>
                </div>
            </div>
        </div>
    </div>



    @endsection
