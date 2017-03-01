<?php

namespace Model;

class Callback{
	private $nbItemsRetournes;
	private $nbItemsExistants;
	private $items;
	private $headerInfo;

	public function __construct($response = [], $headerInfo = [])
	{
		if (isset($response['nbItemsExistants'])) {
			$this->nbItemsExistants = $response['nbItemsExistants'];	
		}
		if (isset($response['nbItemsRetournes'])) {
			$this->nbItemsExistants = $response['nbItemsRetournes'];	
		}
		if (isset($response['item'])) {
			$this->nbItemsExistants = $response['item'];	
		}
		$this->headerInfo = $headerInfo;
	}


	public function getNbItemsExistants()
	{
		return $this->nbItemsExistants;
	}

	public function getNbItemsRetournes()
	{
		return $this->nbItemsRetournes;
	}

	public function getItems()
	{
		return $this->items;
	}
}