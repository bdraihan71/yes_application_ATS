<html>
    <h3>Passed ({{count($students)}})</h3>
    @include('ats.preliminary_application.partials.table_full', ['criterion' => $criterion, 'students' => $students])

    <h3>Failed  ({{count($students_failed)}})</h3>
    @include('ats.preliminary_application.partials.table_full', ['criterion' => $criterion, 'students' => $students_failed])

    <h3>Not Scored  ({{count($not_scored)}})</h3>
    @include('ats.preliminary_application.partials.table_full', ['criterion' => $criterion, 'students' => $not_scored])
</html>