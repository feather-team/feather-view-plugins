<?php
class Feather_View_Plugin_Array{
	/*
	调用数组中的某个key，如果不存在则返回default值，key的格式为a.b.c格式			
	*/
	public function get(array $data, $key, $default = null){
		$keys = explode('.', $key);

		foreach($keys as $key){
			if(isset($data[$key])){
				$data = $data[$key];
			}else{
				return $default;
			}
		}

		return $data;
	}
}