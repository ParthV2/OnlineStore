<?php
  class CategoryRepository {
    public static function getCategoryById($id) {
        $conn = Database::getConnection();
        if ($stmt = $conn->prepare("SELECT * FROM CATEGORY WHERE category_id = ? LIMIT 1;")) {

            $stmt->bind_param("i", $id);
            $stmt->execute();

            $result = $stmt->get_result();
            
            
            while ($row = $result->fetch_assoc()) {
                $category = CategoryRepository::bindCategory($row);
                
            }

            $stmt->free_result();
            $stmt->close();
        }
        
        return $category;
    }
    
    public static function getCategories(){
        $categories = array();
        
        $conn = Database::getConnection();
        if ($stmt = $conn->prepare("SELECT * FROM CATEGORY;")) {

            $stmt->execute();

            $result = $stmt->get_result();
            
            while ($row = $result->fetch_assoc()) {
                array_push($categories, CategoryRepository::bindCategory($row));
            }

            $stmt->free_result();
            $stmt->close();
        }
        
        return $categories;
    }
    
    public static function bindCategory($row){
        $category = new Category();
        $category->id = $row['category_id'];
        $category->name = $row['category_name'];
        return $category;
    }
  }
?>