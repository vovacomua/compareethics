<?php


namespace App\Services;

use App\Http\Requests\Students\CreateStudentRequest;
use App\Student;
use Illuminate\Support\Collection;

/**
 * Class StudentService
 * @package App\Http\Services
 */
class StudentService
{

    /**
     * @return Collection|null
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * @param  CreateStudentRequest  $request
     * @return int|null;
     */
    public function store(CreateStudentRequest $request)
    {
        $student = Student::create($request->toArray());

        return $student->id;
    }
}
