<?php namespace Core;

class MotorView
{
	public static function view(?string $view, ?array $data)
	{
		try {
			require_once($_SERVER['DOCUMENT_ROOT'] . '/Views/' . $view . '.php');
		} catch (Exception $e) {
			print_r([
				"error" => true,
				"messge" => "Excepción capturada: " . $e->getMessage()
			]);
		}
	}
}