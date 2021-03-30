
  @extends('MasterAdmin')
  @section('container')


<div style="display:inline">
<div style="display:flex; height:max;  margin-bottom:20%;margin-left:40%; border-radius: 1%; box-shadow: 5px 5px 10px rgba(0,0,0,0.5); width:100%">
        <div style="display:inline; width:100%">
            <h3>Fee</h3>
            <form action="{{route('addCourse')}}" method="post">
            <div style="display:flex; width:100%; margin-bottom:10%">
                <div class="form__group field">
                            <input type="input" class="form__field" placeholder="Course Name" name="Course"  required />
                            <label for="name" class="form__label">Course Name</label>
                </div>
                <div class="form__group field">
                            <input type="input" class="form__field" placeholder="Set Fee" name="Fee"  required />
                            <label for="name" class="form__label">Set Fee</label>
                </div>

                    <div class="buttons" style="margin-top:0px; height:60px">
                    <button type="submit" class="btn effect01"><span>Set Fee</span></button>
                    </div>



            </div>
        </form>
        </div>
</div>


        <div class="tablecontainer">
            <div class="search">
                <div>
                  <input type="text" placeholder="Search . . ." required>
                </div>
              </div>
            <table >
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>Course</th>
                    <th>Fee</th>
                    <th>Action</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courseData as $key=>$courseDatum)
                    <tr>
                        <td>{{++$key}}</td>
                        <td>{{$courseDatum->Course}}</td>
                        <td>{{$courseDatum->Fee}}</td>


                        <td>

                            <a href="{{route('editCourse').'/'.$courseDatum->id}}" class="edit">Edit</a>


                            <a href="{{route('deleteCourse').'/'.$courseDatum->id}}" class="delete">Delete</a>

                        </td>
                        <td>{{$courseDatum->created_at->DiffForHumans()}} </td>

                    </tr>

                @endforeach
                </tbody>
            </table>


            {{$courseData->links()}}

        </div>

</div>





    @endsection
