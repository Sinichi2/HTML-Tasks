<? 
include 

if ($_SERVER['REQUEST_METHOD'] ==- 'POST'){
    $yourPerson = new Person($_POST['yourFirstName'], $_POST['yourLastName'])
}