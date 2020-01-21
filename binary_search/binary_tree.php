<?php
/**
 * This is a class for creating the binary nodes
 */
class BinaryNode { 

    private $data; 
    private $left; 
    private $right; 

    public function __construct(string $data = NULL) { 
      $this->data = $data; 
      $this->left = NULL; 
      $this->right = NULL; 
    } 

    /**
     * Adds child nodes
     */
    public function addChildren($left, $right) { 
      $this->left = $left;
      $this->right = $right;
    }

}

/**
 * Class for creating the binary tree
 */
class BinaryTree { 

    private $root = null;

    public function __construct() {
        $this->root = null;
    }

    /**
     * Method to check if the tree is empty
     */
    public function isEmpty() {
        return $this->root === null;
    }

    /**
     * Method to insert elements in to the binary tree
     */
    public function insert($data) {
        $node = new BinaryNode($data);
        if ($this->isEmpty()) { // this is the root node
            $this->root = $node;
            return true;
        } else {
            return $this->insertNode($node, $this->root);
        }
    }

    /**
     * Method to recursively add nodes to the binary tree
     */
    private function insertNode($node, $current) {
        $added = false;
        while($added === false) {
            if ($node->data < $current->data) {
                if($current->left === null) {
                $current->addChildren($node, $current->right);
                $added = true;
                } else {
                    $current = $current->left;
                    $this->insertNode($node, $current);
                }
                
            }
            elseif ($node->data > $current->data) {
                if($current->right === null) {
                    $current->addChildren($current->left, $node);
                    $added = true;
                    } else {
                        $current = $current->right;
                        $this->insertNode($node, $current);
                    }
            } else {
            break;
            }
        }
        return $added;   
    }

    /**
     * Method to retrieve a node from the binary tree
     */
    public function retrieve($node) {
        if ($this->isEmpty()) { // this is the root node
            return false;
        }
            $current = $this->root;
            if ($node->data === $this->root->data) {             
              return true;
            } else {
              return $this->retrieveNode($node, $current);        
            }
    }

    /**
     * Method to recursively add nodes to a binary tree
     */
    private function retrieveNode($node, $current) {
        $exists = false;
        while($exists === false) {
            if ($node->data < $current->data) {
              if ($current->left === null) {
                break;
                }
                elseif($node->data == $current->left->data) {
                  $exists = $current->left;
                  break;
                }
                 else {
                    $current = $current->left;
                    $this->retrieveNode($node, $current);
                }
                
            }
            elseif ($node->data > $current->data) {
              if ($current->right === null) {
                break;
              }
                elseif($node->data == $current->right->data) {
                  $exists = $current->right;
                  break;
                } else {
                    $current = $current->right;
                    $this->retrieveNode($node, $current);
                }
            }
        }
        return $exists;
    }

    /**
     * Method to convert the binary tree to an array and print it out
     */
    public function printTree() {

    }

    /**
     * Method to remove an element from the binary tree
     */
    public function removeElement($elem) {

    }

    public function size() {

    }
}
