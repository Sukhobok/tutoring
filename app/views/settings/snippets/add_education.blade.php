{{ Form::select('type[]', array(
	'highschool' => 'High School',
	'college' => 'College',
	'graduation' => 'Graduation School'
), 'highschool', array('class' => 'ss-select')) }}

{{ Form::select('degree[]', array(
	'n/a' => 'N/A',
	'bachelor' => 'Bachelor Degree',
	'master' => 'Master Degree',
	'doctorate' => 'Doctorate Degree'
), 'n/a', array('class' => 'ss-select')) }}

{{ Form::text('name[]', '', array('class' => 'ss-input1 highschool-autocomplete', 'placeholder' => 'Enter the school name ...')) }}
{{ Form::hidden('education_id[]', '0') }}
<br />
From: {{ Form::selectRange('from[]', date('Y')+5, date('Y')-100, '', array('class' => 'ss-select')) }}
&nbsp;
To: {{ Form::selectRange('to[]', date('Y')+5, date('Y')-100, '', array('class' => 'ss-select')) }}
&nbsp;
Majored in: {{ Form::text('major[]', '', array('class' => 'ss-input1 major-autocomplete', 'placeholder' => '(Optional)', 'style' => 'width: 150px;')) }}
{{ Form::hidden('major_id[]', '0') }}
{{ Form::button('Delete', array('class' => 'ss-button red bold ss-delete')) }}
