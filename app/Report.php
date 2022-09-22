<?php

namespace App;

use App\Project;
use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $guarded = ['id'];
    protected $appends = ['claim_amount', 'c_i_no', 'd_n_no', 'd_n_amount', 'd_n_r_amount', 'd_n_r_date'];

//    public function setContractDateAttribute($value)
//    {
//        $this->attributes['contract_date'] = \DateTime::createFromFormat("d-m-Y", $value)->format("Y-m-d");
//    }


    public function getContractDateAttribute($value)
    {
        return $value == "0000-00-00" ? "" : $value;
//        return \DateTime::createFromFormat("Y-m-d", $value)->format("d-m-y");
    }

    public function getPILatestDateOfLcOpeningAttribute($value)
    {
        return $value == "0000-00-00" ? "" : $value;
//        return \DateTime::createFromFormat("Y-m-d", $value)->format("d-m-y");
    }

    public function getPILatestDateOfShipmentAttribute($value)
    {
        return $value == "0000-00-00" ? "" : $value;
//        return \DateTime::createFromFormat("Y-m-d", $value)->format("d-m-y");
    }

    public function getLcDateOfIssueAttribute($value)
    {
        return $value == "0000-00-00" ? "" : $value;
//        return \DateTime::createFromFormat("Y-m-d", $value)->format("d-m-y");
    }

    public function getIpDateAttribute($value)
    {

        return $value == "0000-00-00" ? "" : $value;
//        return \DateTime::createFromFormat("Y-m-d", $value)->format("d-m-y");
    }

    public function getIpExpiryDateAttribute($value)
    {
        return $value == "0000-00-00" ? "" : $value;
//        return \DateTime::createFromFormat("Y-m-d", $value)->format("d-m-y");
    }

    public function getSroDateAttribute($value)
    {
        return $value == "0000-00-00" ? "" : $value;
//        return \DateTime::createFromFormat("Y-m-d", $value)->format("d-m-y");
    }

    public function getEtaDateAttribute($value)
    {
        return $value == "0000-00-00" ? "" : $value;
//        return \DateTime::createFromFormat("Y-m-d", $value)->format("d-m-y");
    }
    public function getClaimAmountAttribute() {
        $amounts = [];
        $qtys = explode(',', $this->s_g_w_c_short_gain_weight_claim_qty);
        $price = preg_replace('/[^0-9.]/', '', $this->s_c_price);
        foreach($qtys as $qty) {
            $amounts[] = $price * $qty;
        }
        return implode(', ', $amounts);
    }
    public function isJson($string) {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
    public function getCINoAttribute() {
        //nn_commercial_invoice_no
        $project_id = $this->project_id;
        $matchThese = ['project_id' => $project_id, 'project_option' => 'nn_commercial_invoice_no'];
        $data = Project::where($matchThese)->first();
        $nn_commercial_invoice_no = $data->project_value ?? '';
        if($this->isJson($nn_commercial_invoice_no)) {
            $comma_separated_string = implode(', ', json_decode(stripslashes($nn_commercial_invoice_no)));
            return $comma_separated_string;
        }
        return $nn_commercial_invoice_no;
    }
    /*
        Debit Note Number
        Debit Note Date
        Debit Note Amount
        Debit Note Received Amount
        Debit Note Amount Received Date
     */
    public function getDNNoAttribute() {
        $project_id = $this->project_id;
        $matchThese = ['project_id' => $project_id, 'project_option' => 'debit_note_number'];
        $data = Project::where($matchThese)->first();
        return $data->project_value ?? '';
    }
    public function getDNAmountAttribute() {
        $project_id = $this->project_id;
        $matchThese = ['project_id' => $project_id, 'project_option' => 'debit_note_amount'];
        $data = Project::where($matchThese)->first();
        return $data->project_value ?? '';
    }
    public function getDNRAmountAttribute() {
        $project_id = $this->project_id;
        $matchThese = ['project_id' => $project_id, 'project_option' => 'debit_note_received_amount'];
        $data = Project::where($matchThese)->first();
        return $data->project_value ?? '';
    }
    public function getDNRDateAttribute() {
        $project_id = $this->project_id;
        $matchThese = ['project_id' => $project_id, 'project_option' => 'debit_note_amount_received_date'];
        $data = Project::where($matchThese)->first();
        return $data->project_value ?? '';
    }
}
