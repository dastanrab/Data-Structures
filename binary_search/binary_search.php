<?php

class BinarySearch {

    public static function search($arr, $x) {
        if (count($arr) === 0) return false; 
        $low = 0; 
        $high = count($arr) - 1; 
          
        while ($low <= $high) { 
              
            $mid = floor(($low + $high) / 2); 
       
            if($arr[$mid] == $x) { 
                return true; 
            } 
      
            if ($x < $arr[$mid]) { 
                $high = $mid -1; 
            } 
            else { 
                $low = $mid + 1; 
            } 
        } 
          
        return false; 
    }

    public function searchRecursively($arr, $start, $end, $x) {
        if ($end < $start) 
            return false; 
        
        $mid = floor(($end + $start)/2); 
        if ($arr[$mid] == $x)  
            return true; 
        
        elseif ($arr[$mid] > $x) { 
        
            // call binarySearch on [start, mid - 1] 
            return $this->searchRecursively($arr, $start, $mid - 1, $x); 
        } 
        else { 
        
            // call binarySearch on [mid + 1, end] 
            return $this->searchRecursively($arr, $mid + 1, $end, $x); 
        } 
    }
}
