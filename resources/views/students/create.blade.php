<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Student Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="text-center mb-4">Enter Student Data</h2>

            <form action="{{ route('students.store') }}" method="post">

                @csrf

                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label h5"> Student Name</label>
                        <input value="{{ old('name') }}" type="text"
                            class=" @error('name') is-invalid @enderror form-control form-control-lg" placeholder="Name"
                            name="name">
                        @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="roll_number" class="form-label h5">Roll Number:</label>
                        <input value="{{ old('roll_number') }}" type="text"
                            class=" @error('roll_number') is-invalid @enderror form-control form-control-lg"
                            placeholder="Roll" name="roll_number">
                        @error('roll_number')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender:</label>
                        <select id="gender" name="gender" class="form-select">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="class" class="form-label h5">Class</label>
                        <input type="text" class=" @error('class') is-invalid @enderror form-control form-control-lg"
                            placeholder="class" name="class">
                        @error('class')
                            <p class="invalid feedback">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label for="subjects" class="form-label h5">Subjects:</label>
                        <input type="text" name="subjects"
                            class=" @error('subjects') is-invalid @enderror form-control form-control-lg"
                            placeholder="Enter subjects separated by commas">
                        @error('subjects')
                            <p class="invalid feedback">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="d-grid">
                    <button class="btn btn-lg btn-primary">Submit</button>

                </div>
            </form>
        </div>
    </div>

</body>

</html>
