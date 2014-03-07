{{ Form::select('type', array(
	'hs' => 'High School',
	'c' => 'College',
	'gs' => 'Graduation School'
), isset($education_item->type) ? $education_item->type : 'hs', array('class' => 'ss-select')) }}

{{ Form::select('degree', array(
	'n' => 'N/A',
	'b' => 'Bachelor Degree',
	'm' => 'Master Degree',
	'd' => 'Doctorate Degree'
), isset($education_item->degree) ? $education_item->degree : 'n', array('class' => 'ss-select')) }}

{{ Form::text('name', isset($education_item->name) ? $education_item->name : '', array('class' => 'ss-input1', 'placeholder' => 'Enter the school name ...')) }}
<br />
From: {{ Form::selectRange('from', date('Y')+5, date('Y')-100, isset($education_item->from) ? $education_item->from : '', array('class' => 'ss-select')) }}
&nbsp;
To: {{ Form::selectRange('to', date('Y')+5, date('Y')-100, isset($education_item->to) ? $education_item->to : '', array('class' => 'ss-select')) }}
&nbsp;
Majored in: {{ Form::text('major', isset($education_item->major) ? $education_item->major : '', array('class' => 'ss-input1', 'placeholder' => '(Optional)', 'style' => 'width: 150px;')) }}
{{ Form::button('Delete', array('class' => 'ss-button red bold ss-delete')) }}
