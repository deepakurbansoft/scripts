<?php
$id = $this->input->post('id');
$sl_no = $this->input->post('sl_no');
$fees = $this->crud_model->select_row('id',$id,'fees');

$category = $fees[0]->category;
$amount = $fees[0]->amount;
$date = $fees[0]->date;

?>



