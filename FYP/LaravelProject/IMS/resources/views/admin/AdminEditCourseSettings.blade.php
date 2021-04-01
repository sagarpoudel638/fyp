
  @extends('MasterAdmin')
  @section('container')


<div style="display:inline;">
<div style="display:flex; height:max;  margin-bottom:50%;margin-left:40%; margin-top:35%; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); width:100%">
        <div style="display:inline; width:100%">
            <h3>Edit Fee</h3>
            <form action="{{route('editActionCourse')}}" method="POST">
            <div style="display:flex; width:100%; margin-bottom:10%">
                <input type="hidden" name="Course_id" value="{{$editCourse->id}}">
                <div class="form__group field">
                    <a href="" style="color: red;">{{$errors->first('Course')}}</a>
                            <input type="input" class="form__field" placeholder="Course Name" name="Course" value="{{$editCourse->Course}}"  />
                            <label for="name" class="form__label">Course Name</label>
                </div>
                <div class="form__group field">
                    <a href="" style="color: red;">{{$errors->first('Fee')}}</a>
                            <input type="input" class="form__field" placeholder="Set Fee" name="Fee"  value="{{$editCourse->Fee}}"  />
                            <label for="name" class="form__label">Fee</label>
                </div>
                    <div class="buttons" style="margin-top:0px; height:50px; margin-right:5%; margin-left:5%">
                    <button type="submit" class="btn effect01"><span>Update</span></button>
                    </div>




            </div>
        </form>
        </div>
</div>






</div>





    @endsection
