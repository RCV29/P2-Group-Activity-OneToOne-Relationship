<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert">{{session('status')}}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit Student
                            <a href="{{ url('students')}}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('students/'.$student->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            <h4>Student</h4>
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{$student->name}}" required>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Age</label>
                                <input type="text" name="age" value="{{$student->age}}" required>
                                @error('age') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" name="address" value="{{$student->address}}" required>
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            
                            <h4>Academic</h4>
                            <div class="mb-3">
                                <label>Course</label>
                                <input type="text" name="course" value="{{optional($student->academic)->course}}" required>
                                @error('course') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Year</label>
                                <input type="text" name="year" value="{{optional($student->academic)->year}}" required>
                                @error('year') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <h4>Country</h4>
                            <div class="mb-3">
                                <label>Continent</label>
                                <input type="text" name="continent" value="{{optional($student->country)->continent}}" required>
                                @error('continent') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Country Name</label>
                                <input type="text" name="country_name" value="{{optional($student->country)->country_name}}" required>
                                @error('country_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Capital</label>
                                <input type="text" name="capital" value="{{optional($student->country)->capital}}" required>
                                @error('capital') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>