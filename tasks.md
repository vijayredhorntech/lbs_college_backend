# Attendance App Changes

## Tasks

1. [x] Update PHP version to 8.2 in composer.json
2. [x] Update all dependencies
3. [x] Add Courses option under Subject (e.g., Physics: course title)
4. [x] Add Class option (1st Year, 2nd Year, 3rd Year or Semester)
5. [x] Enhance Attendance options (P, A, and Leave)
6. [x] Implement Password change option (currently one password for all)
7. [x] Fix issue with student names not being reflected correctly in attendance

## Progress

### 1. Update PHP version to 8.2
- ✅ Modified composer.json to require PHP 8.2

### 2. Update all dependencies
- ✅ Successfully ran composer update after adjusting package version requirements

### 3. Add Courses option under Subject
- ✅ Modified Subject model to relate to Course model
- ✅ Added course_id field to subjects table
- ✅ Updated the UI to show course options under subjects

### 4. Add Class option
- ✅ Added class_year field to faculty_classes table
- ✅ Updated FacultyClasses model to include class_year field
- ✅ Updated UI to include class/year selection

### 5. Enhance Attendance options
- ✅ Modified ClassAttendance model to support Leave status
- ✅ Changed the 'attended' boolean field to a 'status' enum field with options: present, absent, leave
- ✅ Updated UI to include Leave option

### 6. Implement Password change option
- ✅ Created ChangePassword Livewire component
- ✅ Added route for password change page
- ✅ Implemented password change functionality

### 7. Fix student name issue
- ✅ Updated MarkAttendance component to correctly handle student names from FacultyClassStudent model
- ✅ Fixed the issue with attendance marking by using the correct student IDs 