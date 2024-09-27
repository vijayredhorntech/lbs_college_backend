<?php
namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toastable;
use Storage;

class StudentEnrollmentForm extends Component
{
    use WithFileUploads;
    use Toastable;

    public $form = [
        'first_name' => '',
        'last_name' => '',
        'mother_name' => '',
        'guardian_father_name' => '',
        'email' => '',
        'phone' => '',
        'uni_roll_number' => '',
        'uni_registration_no' => '',
        'date_of_birth' => '',
        'gender' => '',
        'alt_phone' => '',
        'father_phone' => '',
        'club_name' => '',
        'domicile' => '',
        'aadhar_number' => '',
        'pan_number' => '',
        'nationality' => '',
        'religion' => '',
        'father_occupation' => '',
        'yearly_income' => '',
        'permanent_address' => '',
        'temp_address' => '',
        'is_expelled_before' => false,
        'expulsion_reason' => '',
        'photo' => null,
        'signature' => null
    ];
    public $profilePhoto = null;
    public $student = null;

    public function mount()
    {

        if ($this->student) {
            $this->student = Student::whereUuid($this->student)->first();
            $this->form = $this->student->toArray();
            $this->form['photo'] = null;
            $this->profilePhoto = $this->student->profilePhoto;
        }
    }

    public function render()
    {
        return view('livewire.student-enrollment-form')->layout('layouts.app');
    }

    protected function rules()
    {
        return [
            'form.first_name' => 'required|string|max:255',
            'form.last_name' => 'required|string|max:255',
            'form.mother_name' => 'nullable|string|max:255',
            'form.guardian_father_name' => 'nullable|string|max:255',
            'form.email' => [
                'required',
                'email',
                'max:255',
                $this->student ? 'unique:students,email,' . $this->student->id : 'unique:students,email'
            ],
            'form.phone' => 'required|string|size:10',
            'form.uni_roll_number' => 'required|string',
            'form.uni_registration_no' => 'required|string',
            'form.date_of_birth' => 'required|date',
            'form.gender' => 'required|string|in:male,female,others',
            'form.alt_phone' => 'nullable|string|size:10',
            'form.father_phone' => 'nullable|string|size:10',
            'form.club_name' => 'nullable|string|max:255',
            'form.domicile' => 'nullable|string|max:255',
            'form.aadhar_number' => 'nullable|string|size:12',
            'form.pan_number' => 'nullable|string|size:10',
            'form.nationality' => 'nullable|string|max:255',
            'form.religion' => 'nullable|string|max:255',
            'form.father_occupation' => 'nullable|string|max:255',
            'form.yearly_income' => 'nullable|numeric',
            'form.permanent_address' => 'nullable|string',
            'form.temp_address' => 'nullable|string',
            'form.is_expelled_before' => 'boolean',
            'form.expulsion_reason' => 'required_if:form.is_expelled_before,true',
            'form.photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'form.signature' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    protected $messages = [
        'form.first_name.required' => 'The first name field is required.',
        'form.first_name.string' => 'The first name must be a string.',
        'form.first_name.max' => 'The first name may not be greater than 255 characters.',
        'form.last_name.required' => 'The last name field is required.',
        'form.last_name.string' => 'The last name must be a string.',
        'form.last_name.max' => 'The last name may not be greater than 255 characters.',
        'form.mother_name.string' => 'The mother name must be a string.',
        'form.mother_name.max' => 'The mother name may not be greater than 255 characters.',
        'form.guardian_father_name.string' => 'The guardian/father name must be a string.',
        'form.guardian_father_name.max' => 'The guardian/father name may not be greater than 255 characters.',
        'form.email.required' => 'The email field is required.',
        'form.email.email' => 'The email must be a valid email address.',
        'form.email.max' => 'The email may not be greater than 255 characters.',
        'form.email.unique' => 'The email has already been taken.',
        'form.phone.required' => 'The phone field is required.',
        'form.phone.string' => 'The phone must be a string.',
        'form.phone.size' => 'The phone must be 10 digits.',
        'form.uni_roll_number.required' => 'The university roll number field is required.',
        'form.uni_registration_no.required' => 'The university registration number field is required.',
        'form.date_of_birth.required' => 'The date of birth field is required.',
        'form.date_of_birth.date' => 'The date of birth must be a valid date.',
        'form.gender.required' => 'The gender field is required.',
        'form.gender.string' => 'The gender must be a string.',
        'form.gender.in' => 'The selected gender is invalid.',
        'form.alt_phone.string' => 'The alternate phone must be a string.',
        'form.alt_phone.size' => 'The alternate phone must be 10 digits.',
        'form.father_phone.string' => 'The father phone must be a string.',
        'form.father_phone.size' => 'The father phone must be 10 digits.',
        'form.club_name.string' => 'The club name must be a string.',
        'form.club_name.max' => 'The club name may not be greater than 255 characters.',
        'form.domicile.string' => 'The domicile must be a string.',
        'form.domicile.max' => 'The domicile may not be greater than 255 characters.',
        'form.aadhar_number.string' => 'The Aadhar number must be a string.',
        'form.aadhar_number.size' => 'The Aadhar number must be 12 characters.',
        'form.pan_number.string' => 'The PAN number must be a string.',
        'form.pan_number.size' => 'The PAN number must be 10 characters.',
        'form.nationality.string' => 'The nationality must be a string.',
        'form.nationality.max' => 'The nationality may not be greater than 255 characters.',
        'form.religion.string' => 'The religion must be a string.',
        'form.religion.max' => 'The religion may not be greater than 255 characters.',
        'form.father_occupation.string' => 'The father occupation must be a string.',
        'form.father_occupation.max' => 'The father occupation may not be greater than 255 characters.',
        'form.yearly_income.numeric' => 'The yearly income must be a number.',
        'form.permanent_address.string' => 'The permanent address must be a string.',
        'form.temp_address.string' => 'The temporary address must be a string.',
        'form.is_expelled_before.boolean' => 'The is expelled before field must be true or false.',
        'form.expulsion_reason.string' => 'The expulsion reason must be a string.',
        'form.expulsion_reason.required_if' => 'The expulsion reason field is required if student is expelled before.',
        'form.photo.image' => 'The photo must be an image.',
        'form.photo.mimes' => 'The photo must be a file of type: jpeg, png, jpg.',
        'form.photo.max' => 'The photo may not be greater than 2048 kilobytes.',
        'form.signature.image' => 'The signature must be an image.',
        'form.signature.mimes' => 'The signature must be a file of type: jpeg, png, jpg.',
        'form.signature.max' => 'The signature may not be greater than 2048 kilobytes.'
    ];

    public function submit()
    {
        $this->validate();
        if ($this->form['photo']) {
            if ($this->student?->photo) {
                Storage::disk('private')->delete($this->student->photo);
            }
            $this->form['photo'] = $this->form['photo']->store('photos', 'private');
        } else {
            $this->form['photo'] = $this->student?->photo;
        }
        if($this->form['signature']){
            if ($this->student?->signature) {
                Storage::disk('private')->delete($this->student->signature);
            }
            $this->form['signature'] = $this->form['signature']->store('signatures', 'private');
        } else {
            $this->form['signature'] = $this->student?->signature;
        }
        $this->student ? $this->student->update($this->form) : Student::create($this->form + ['user_id' => auth()->id()]);
        $this->reset('form');
        $this->success('Application submitted successfully.');
    }
}

