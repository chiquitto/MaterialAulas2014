<?php

interface IPizza {
	public function ingredientes();
	public function prepararMassa();
	public function naForma();
	public function preAssar();
	public function rechear();
	public function assar();
	public function cortar();
}