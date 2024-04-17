<?php
if ($request->get('mark')) {
    $mark = $request->get('mark');

    $existingGrade = Grades::where('discipline_groop_id', $discipline_groop_id)
        ->where('student_id', $student_id)->first();
    if ($existingGrade) {
        $existingGrade->update([
            'mark' => $mark,
        ]);
    } else {
        Grades::create([
            'discipline_groop_id' => $discipline_groop_id,
            'student_id' => $student_id,
            'mark' => $mark,
        ]);
    }
}