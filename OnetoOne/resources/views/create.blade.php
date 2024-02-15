<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/cs/bootstrap.min.css" rel="stylesheet" >
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
                        <h4>Add Student
                            <a href="{{ url('students')}}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('students')}}" method="POST">
                            @csrf

                            <h4>Student</h4>
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" value="{{old('name')}}" required>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Age</label>
                                <input type="text" name="age" value="{{old('age')}}" required>
                                @error('age') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" name="address" value="{{old('address')}}" required>
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            
                            <h4>Academic</h4>
                            <div class="mb-3">
                                <label>Course</label>
                                <input type="text" name="course" value="{{old('course')}}" required>
                                @error('course') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Year</label>
                                <input type="text" name="year" value="{{old('year')}}" required>
                                @error('year') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <h4>Country</h4>
                            <div class="mb-3">
                                <label>Continent</label>
                                <input type="text" name="continent" value="{{old('continent')}}" required>
                                @error('continent') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Country Name</label>
                                <input type="text" name="country_name" value="{{old('country_name')}}" required>
                                @error('country_name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <label>Capital</label>
                                <input type="text" name="capital" value="{{old('capital')}}" required>
                                @error('capital') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>