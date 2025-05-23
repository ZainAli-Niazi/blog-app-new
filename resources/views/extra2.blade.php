 @extends('layout/master')
 
 @section('addstudent')


 <form enctype="multipart/form-data" action=" " method="post">
    @csrf

    <!-- ACADEMIC INFO -->
    <div class="form-section">
        <div class="form-title">ACADEMIC INFORMATION</div>
        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Academic Year <span class="required-star">*</span></label>
                <select class="form-select @error('academic_year') is-invalid @enderror" name="academic_year"
                    required>
                    <option disabled selected>Select year</option>
                    <option value="2023-2024" {{ old('academic_year') == '2023-2024' ? 'selected' : '' }}>
                        2023-2024</option>
                    <option value="2024-2025" {{ old('academic_year') == '2024-2025' ? 'selected' : '' }}>
                        2024-2025</option>
                    <option value="2025-2026" {{ old('academic_year') == '2025-2026' ? 'selected' : '' }}>
                        2025-2026</option>
                </select>
                @error('academic_year')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-3">
                <label class="form-label">Class <span class="required-star">*</span></label>
                <select class="form-select @error('class') is-invalid @enderror" name="class" required>
                    <option value="" disabled {{ old('class') ? '' : 'selected' }}>Select class</option>
                    <option value="Nursery" {{ old('class') == 'Nursery' ? 'selected' : '' }}>Nursery</option>
                    <option value="LKG" {{ old('class') == 'LKG' ? 'selected' : '' }}>LKG</option>
                    <option value="UKG" {{ old('class') == 'UKG' ? 'selected' : '' }}>UKG</option>
                    <option value="1st" {{ old('class') == '1st' ? 'selected' : '' }}>1st</option>
                    <option value="2nd" {{ old('class') == '2nd' ? 'selected' : '' }}>2nd</option>
                    <option value="3rd" {{ old('class') == '3rd' ? 'selected' : '' }}>3rd</option>
                    <option value="4th" {{ old('class') == '4th' ? 'selected' : '' }}>4th</option>
                    <option value="5th" {{ old('class') == '5th' ? 'selected' : '' }}>5th</option>
                    <option value="6th" {{ old('class') == '6th' ? 'selected' : '' }}>6th</option>
                    <option value="7th" {{ old('class') == '7th' ? 'selected' : '' }}>7th</option>
                    <option value="8th" {{ old('class') == '8th' ? 'selected' : '' }}>8th</option>
                    <option value="9th" {{ old('class') == '9th' ? 'selected' : '' }}>9th</option>
                    <option value="10th" {{ old('class') == '10th' ? 'selected' : '' }}>10th</option>
                    <option value="11th" {{ old('class') == '11th' ? 'selected' : '' }}>11th</option>
                    <option value="12th" {{ old('class') == '12th' ? 'selected' : '' }}>12th</option>
                </select>
                @error('class')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-3">
                <label class="form-label">Section <span class="required-star">*</span></label>
                <select class="form-select @error('section') is-invalid @enderror" name="section" required>
                    <option value="" disabled {{ old('section') ? '' : 'selected' }}>Select section
                    </option>
                    <option value="A" {{ old('section') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('section') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('section') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('section') == 'D' ? 'selected' : '' }}>D</option>
                    <option value="E" {{ old('section') == 'E' ? 'selected' : '' }}>E</option>
                </select>
                @error('section')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-3">
                <label class="form-label">Admission ID</label>
                <input type="text" class="form-control @error('admission_id') is-invalid @enderror"
                    name="admission_id" placeholder="Enter Admission ID" value="{{ old('admission_id') }}">
                @error('admission_id')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-3">
                <label class="form-label">Admission Date <span class="required-star">*</span></label>
                <input type="date" class="form-control @error('admission_date') is-invalid @enderror"
                    name="admission_date" required value="{{ old('admission_date') }}">
                @error('admission_date')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <!-- PERSONAL INFO -->
    <div class="form-section">
        <div class="form-title">PERSONAL INFORMATION</div>
        <div class="row g-3">
            <!-- First Name Field -->
            <div class="col-md-6">
                <label class="form-label">First Name <span class="required-star">*</span></label>
                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                    name="first_name" placeholder="Enter first name" required
                    value="{{ old('first_name') }}" maxlength="50">
                @error('first_name')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <!-- Last Name Field -->
            <div class="col-md-6">
                <label class="form-label">Last Name <span class="required-star">*</span></label>
                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                    name="last_name" placeholder="Enter last name" required value="{{ old('last_name') }}"
                    maxlength="50">
                @error('last_name')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">Date of Birth <span class="required-star">*</span></label>
                <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob"
                    required value="{{ old('dob') }}">
                @error('dob')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">Gender <span class="required-star">*</span></label>
                <select class="form-select @error('gender') is-invalid @enderror" name="gender" required>
                    <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select gender
                    </option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                    <option value="Prefer not to say"
                        {{ old('gender') == 'Prefer not to say' ? 'selected' : '' }}>Prefer not to say</option>
                </select>
                @error('gender')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-4">
                <label class="form-label">Religion</label>
                <select class="form-select @error('religion') is-invalid @enderror" name="religion">
                    <option value="" {{ old('religion') ? '' : 'selected' }}>Select religion</option>
                    <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Christianity" {{ old('religion') == 'Christianity' ? 'selected' : '' }}>
                        Christianity</option>
                    <option value="Hinduism" {{ old('religion') == 'Hinduism' ? 'selected' : '' }}>Hinduism
                    </option>
                    <option value="Buddhism" {{ old('religion') == 'Buddhism' ? 'selected' : '' }}>Buddhism
                    </option>
                    <option value="Sikhism" {{ old('religion') == 'Sikhism' ? 'selected' : '' }}>Sikhism
                    </option>
                    <option value="Judaism" {{ old('religion') == 'Judaism' ? 'selected' : '' }}>Judaism
                    </option>
                    <option value="Other" {{ old('religion') == 'Other' ? 'selected' : '' }}>Other</option>
                    <option value="None" {{ old('religion') == 'None' ? 'selected' : '' }}>None</option>
                </select>
                @error('religion')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <!-- CONTACT INFO -->
    <div class="form-section">
        <div class="form-title">CONTACT INFORMATION</div>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Email (optional)</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" placeholder="Enter email" value="{{ old('email') }}">
                @error('email')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Phone <span class="required-star">*</span></label>
                <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                    id="phone" name="phone" placeholder="Enter phone number" required
                    value="{{ old('phone') }}">
                @error('phone')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Country <span class="required-star">*</span></label>
                <select class="form-select @error('country') is-invalid @enderror" name="country" required>
                    <option disabled selected>Select country</option>
                    <option value="Pakistan" {{ old('country') == 'Pakistan' ? 'selected' : '' }}>Pakistan
                    </option>
                    <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                    <option value="UAE" {{ old('country') == 'UAE' ? 'selected' : '' }}>UAE</option>
                </select>
                @error('country')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Address <span class="required-star">*</span></label>
                <textarea class="form-control @error('address') is-invalid @enderror" name="address" rows="2"
                    placeholder="Enter address" required>{{ old('address') }}</textarea>
                @error('address')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <!-- DOCUMENTS -->
    <div class="form-section">
        <div class="form-title">DOCUMENTS</div>
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Student Photo <span class="required-star">*</span></label>
                <input type="file" class="form-control @error('photo') is-invalid @enderror"
                    name="photo" required>
                @error('photo')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Birth Certificate <span class="required-star">*</span></label>
                <input type="file" class="form-control @error('birth_certificate') is-invalid @enderror"
                    name="birth_certificate" required>
                @error('birth_certificate')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Parent ID Proof (optional)</label>
                <input type="file" class="form-control @error('parent_id_proof') is-invalid @enderror"
                    name="parent_id_proof">
                @error('parent_id_proof')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
        <p class="mt-2 text-muted"><small>Fields marked with <span class="text-danger">*</span> are
                required.</small></p>
    </div>
</form>


 @endsection