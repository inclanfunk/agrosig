<?php

class Stock extends \Eloquent {
	protected $fillable = [
		'fecha',
		'PRODUCTO',
		'PUERTO_ABREVIADO',
		'PUERTO_ABREVIADO',
		'ENTREGA',
		'PRECIO_AJUSTE',
		'MAXIMO_OPERADO',
		'MINIMO_OPERADO',
		'PRIMER_OPERADO',
		'ULTIMO_OPERADO',
		'OI',
		'OI_VOL',
		'MONEDA',
		'TIPO_OPERACION',
		'DIF_OI',
		'DIF_OI_VOL',
		'PRECIO_AJUSTE_ANTERIOR',
		'Dif',
		'VOLUMEN',
		'VOLINTONS',
		'DESCUNIDAD',
		'DESCTIPOOPE'
	];
}