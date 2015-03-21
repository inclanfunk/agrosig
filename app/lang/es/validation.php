<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| El following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	"accepted"             => "El :attribute debe ser aceptado.",
	"active_url"           => "El :attribute no es una URL valida.",
	"after"                => "El :attribute debe ser un fecha despu�s de :date.",
	"alpha"                => "El :attribute solo debe contener letras.",
	"alpha_dash"           => "El :attribute solo debe contener letras, n�meros y guiones.",
	"alpha_num"            => "El :attribute solo debe contener letras, n�meros.",
	"array"                => "El :attribute debe ser una colecci�n.",
	"before"               => "El :attribute debe ser una fecha antes de :date.",
	"between"              => array(
		"numeric" => "El :attribute debe ser entre :min y :max.",
		"file"    => "El :attribute debe ser entre :min y :max kilobytes.",
		"string"  => "El :attribute debe ser entre :min y :max caracteres.",
		"array"   => "El :attribute debe ser entre :min y :max art�culos.",
	),
	"boolean"              => "El :attribute campo debe ser verdadero o falso.",
	"confirmed"            => "El :attribute confirmaci�n no coincide.",
	"date"                 => "El :attribute no es una fecha valida.",
	"date_format"          => "El :attribute no coincide con el formato :format.",
	"different"            => "El :attribute y :other deben ser distintos.",
	"digits"               => "El :attribute debe ser :digits d�gitos.",
	"digits_between"       => "El :attribute debe ser entre :min y :max d�gitos.",
	"email"                => "El :attribute debe ser un mail valido.",
	"exists"               => "El :attribute seleccionado es invalido.",
	"image"                => "El :attribute debe ser una imagen.",
	"in"                   => "El :attribute seleccionado es invalido.",
	"integer"              => "El :attribute debe ser entero.",
	"ip"                   => "El :attribute debe ser una direcci�n IP valida  .",
	"max"                  => array(
		"numeric" => "El :attribute no puede ser mayor que :max.",
		"file"    => "El :attribute no puede ser mayor que :max kilobytes.",
		"string"  => "El :attribute no puede ser mayor que :max caracteres.",
		"array"   => "El :attribute no puede ser mayor que :max art�culos.",
	),
	"mimes"                => "El :attribute debe un archivo de tipo :values.",
	"min"                  => array(
		"numeric" => "El :attribute debe ser como m�nimo :min.",
		"file"    => "El :attribute debe ser como m�nimo :min kilobytes.",
		"string"  => "El :attribute debe ser como m�nimo :min caracteres.",
		"array"   => "El :attribute debe ser como m�nimo :min art�culos.",
	),
	"not_in"               => "El :attribute seleccionado es invalido.",
	"numeric"              => "El :attribute debe ser un n�mero.",
	"regex"                => "El :attribute formato es invalido.",
	"required"             => "El campo :attribute se requiere.",
	"required_if"          => "El campo :attribute se requiere cu�ndo :other es :value.",
	"required_with"        => "El campo :attribute se requiere cu�ndo :values esta presente.",
	"required_with_all"    => "El campo :attribute se requiere cu�ndo :values esta presente.",
	"required_without"     => "El campo :attribute se requiere cu�ndo :values no esta presente.",
	"required_without_all" => "El campo :attribute se requiere cu�ndo ninguna de :values est�n presente.",
	"same"                 => "El :attribute y :other deben coincidir.",
	"size"                 => array(
		"numeric" => "El :attribute debe ser :size.",
		"file"    => "El :attribute debe ser :size kilobytes.",
		"string"  => "El :attribute debe ser :size caracteres.",
		"array"   => "El :attribute debe contener :size art�culos.",
	),
	"unique"               => "El :attribute ya se ha tomado.",
	"url"                  => "El formato :attribute es invalido.",
	"timezone"             => "El :attribute debe ser un �rea valido.",
	"recaptcha" => 'El campo :attribute es incorrecto.',

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(
		'attribute-name' => array(
			'rule-name' => 'custom-message',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| El following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
