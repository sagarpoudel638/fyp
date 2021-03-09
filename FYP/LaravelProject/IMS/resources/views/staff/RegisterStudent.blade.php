@extends('master')
@section('container')



    <div style="display:inline; height:100%;">
        <h2>Registration</h2>
        <div class="form__group field">
            <input type="input" class="form__field" placeholder="Student Full name" name="StudentFullName"  required />
            <label for="name" class="form__label">Student Full Name</label>
        </div>

        <div class="form__group field">
            <input type="input" class="form__field" placeholder="Address" name="Address" required />
            <label for="name" class="form__label">Address</label>
        </div>

        <div class="form__group field">
            <input type="input" class="form__field" placeholder="Primary Number" name="PrimaryNumber" required />
            <label for="name" class="form__label">Primary Number</label>
        </div>

        <div class="form__group field">
            <input type="input" class="form__field" placeholder="Secondary Number" name="SecondaryNumber" required />
            <label for="name" class="form__label">Secondary Number</label>
        </div>

        <hr>
        <h2>Fee Payment</h2>
        <div class="form__group field">
            <input type="input" class="form__field" placeholder="Total Fee" name="TotalFee" required disabled/>
            <label for="name" class="form__label">Total Fee</label>
        </div>
        <div class="form__group field">
            <input type="input" class="form__field" placeholder="Fee Paid" name="FeePaid" required />
            <label for="name" class="form__label">Fee Paid</label>
        </div>
        <div class="form__group field">
            <input type="input" class="form__field" placeholder="Fee Due" name="FeeDue" required disabled/>
            <label for="name" class="form__label">Fee Due</label>
        </div>
        <div style="display: flex; margin-top:50px;margin-left:100px">
            <div class="buttons">
                
                    <a href="#" class="btn effect01" target="_blank"><span>View Receipt</span></a>
                
            </div>

            <div class="buttons" >
                
                    <a href="#" class="btn effect01" target="_blank"><span>Print Receipt</span></a>
                
            </div>

            
        </div>

    </div>
    <div style="display:inline; margin-left:200px; margin-top:50px;">
        <div class="selectdiv">    
            <label>
                <select required>
                    <option value="" hidden> Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
            </label>
        </div>

        <div class="selectdiv" style="margin-top:90px">
            <label>
                <select required>
                    <option value="" hidden> Course</option>
                    <option>Officer</option>
                    <option>Kharidar</option>
                    <option>Nayab Subba</option>
                    <option>Mahila Bikas</option>
                </select>
            </label>
        </div>

        <div class="buttons" style="height:60px;color:aqua; margin-top:890px;">
              
                    <a href="#" class="btn effect01" target="_blank"><span>Register</span></a>
                
        </div>
        
    </div>
    <div style="height:50px"></div>
    


@endsection