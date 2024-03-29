<?php

use Illuminate\Database\Seeder;

class OptionListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            'project_status RUNNING',
            'project_status CLOSE',
            'buyer_id ASIA COMPOSITE MILLS LTD.',
            'buyer_id BADAR SPINNING MILLS LTD.',
            'buyer_id FARIHA SPINNING MILLS',
            'buyer_id HAJEE HASHEM SPINNING MILLS LTD.',
            'buyer_id MOZAFFAR HOSSAIN SPINNING MILLS LTD.',
            'buyer_id NAHEED COTTON MILLS LTD.',
            'buyer_id GLORY SPINNING LTD.',
            'buyer_id PACIFIC SPINNING MILLS LTD.',
            'buyer_id PAKIZA SPINNING MILLS',
            'buyer_id R.K. SPINNING MILLS LTD.',
            'buyer_id SHAHJAHAN SPINNING MILLS LTD.',
            'buyer_id RMT SPINNING MILLS LTD.',
            'buyer_id M.M SPINNING MILLS LTD.',
            'buyer_id ARM TRADING CORPORATION',
            'buyer_id SHEEMA SPINNING MILLS LTD.',
            'buyer_id SHIRIN SPINNING MILLS LTD.',
            'buyer_id AB-R SPINNING MILLS LTD.',
            'buyer_id YOUTH SPINNING MILLS LTD.',
            'buyer_id HAJRAT AMANAT SHAH SPINNING MILLS LTD.',
            'buyer_id AL-HAJ KARIM TEXTILE MILLS LTD.',
            'buyer_id SHANTA ENTERPRISE',
            'buyer_id TAMISHNA SPINNING MILLS LTD.',
            'buyer_id KHADIJA KHATUN & CO.',
            'buyer_id ADVANCE TRADING',
            'buyer_id RAHMAT SPINNING MILLS LTD.',
            'buyer_id SQUARE TEXTILES LTD.',
            'buyer_id OTTO SPINNING  LTD.',
            'buyer_id TOP SPINNING MILLS LTD.',
            'buyer_id N.Z. TEXTILE MILLS LTD.',
            'buyer_id SM SPINNING MILLS LTD.',
            'buyer_id BHUIYAN COTTON TADING CORPORATION',
            'buyer_id NORTH SOUTH SPINNING MILLS LTD. ',
            'buyer_id DELSEY COTTON SPINNING MILLS LTD.',
            'buyer_id JAJ BHUIYAN TEXTILE MILLS',
            'buyer_id JAJ SPINNING MILLS LTD.',
            'buyer_id MOSHARAF COMPOSITE TEXTILE MILLS LTD.',
            'buyer_id N.H. TRADE INTERNATIONAL',
            'buyer_id MILLENNIUM ENTERPRISE LTD.',
            'buyer_id MOSHARRAF SPINNING MILLS LTD.',
            'buyer_id ALAUDDIN TEXTILE MILLS (ATM) PVT. LTD.',
            'buyer_id PACIFIC TRADING CORPORATION',
            'buyer_id A&A TRADE CENTER',
            'buyer_id ENVOY TEXTILES LTD.',
            'buyer_id SEARS LIMITED',
            'buyer_id IDEAL SPINNING MILLS LTD.',
            'buyer_id ARGON SPINNING LTD.',
            'buyer_id AL-HEKMA SPINNING MILLS LTD.',
            'buyer_id Ha-Meem Spinning Mills Ltd. ',
            'buyer_id M/S HASAN TRADERS',
            'buyer_id MIJANUR RAHMAN',
            'buyer_id ADIBA TRADERS',
            'buyer_id FARIHA TRADING CORPORATION LTD.',
            'buyer_id G.S. CORPORATION',
            'buyer_id CRC TEXTILE MILLS LTD',
            'buyer_id S.R TRADERS',
            'supplier_id OLAM INTERNATIONAL',
            'supplier_id PAUL REINHART AG.',
            'supplier_id DHANCOT FIBERS PVT LTD.',
            'supplier_id SUNNY TEXRIM (PVT) LTD.',
            'supplier_id DP COTTON, GUJRAT',
            'supplier_id RAGHUNATH AGROTECH',
            'supplier_id MANJEET COTTON (PVT) LTD.',
            'supplier_id AGROCORP',
            'supplier_id PANASIAN IMPEX PRIVET LTD.',
            'supplier_id COTTON CORPORATION OF INDIA',
            'supplier_id CA COTTON LLP',
            'supplier_id BHADRESH TRADING CORPORATION',
            'supplier_id NAVJYOT INTERNATIONAL',
            'supplier_id GUJRAT COTTON CORPORATION',
            'supplier_id PARVIN GROUP',
            'supplier_id LOUIS DREYFUS COMPANY',
            'supplier_id CALIK COTTON',
            'supplier_id GLENCORE',
            'supplier_id RCMA GROUP',
            's_c_origin AUSTRALIA',
            's_c_origin ARGENTINA',
            's_c_origin BENIN',
            's_c_origin BRAZIL',
            's_c_origin BURKINA FASO',
            's_c_origin CAMEROON',
            's_c_origin CHAD',
            's_c_origin CHINA',
            's_c_origin EGYPT',
            's_c_origin GHANA',
            's_c_origin GREAT BRITAIN',
            's_c_origin GREECE',
            's_c_origin GUINEA',
            's_c_origin HOLLAND',
            's_c_origin INDIA',
            's_c_origin IRAQ',
            's_c_origin IVORY COAST',
            's_c_origin KAZAKISTAN',
            's_c_origin MADAGASCAR',
            's_c_origin MALAWI',
            's_c_origin MALI',
            's_c_origin MOZAMBIQUE',
            's_c_origin NIGERIA',
            's_c_origin PAKISTAN',
            's_c_origin SENEGAL',
            's_c_origin SOUTH AFRICA',
            's_c_origin SPAIN',
            's_c_origin SUDAN',
            's_c_origin TAJIKISTAN',
            's_c_origin TANZANIA',
            's_c_origin TOGO',
            's_c_origin TURKMENISTAN',
            's_c_origin TURKY',
            's_c_origin UGANDA',
            's_c_origin USA',
            's_c_origin UZBEKISTAN',
            's_c_origin ZAMBIA',
            's_c_origin ZIMBABWE',
            's_c_staple_unit INCH',
            's_c_staple_unit MM',
            's_c_mic_unit NCL',
            's_c_strength_unit GPT',
            's_c_quantity_unit MT',
            's_c_quantity_unit LBS',
            's_c_quantity_unit BALES',
            's_c_price_unit USC',
            's_c_price_unit USD',
            's_c_payment AT SIGHT',
            's_c_payment DEFERRED',
            's_c_payment UPASS',
            'p_i_quantity_unit MT',
            'p_i_quantity_unit LBS',
            'lc_type AT SIGHT',
            'lc_type DEFERRED',
            'lc_type UPASS',
            'lc_partial_shipments ALLOWED',
            'lc_partial_shipments NOT ALLOWED',
            'lc_transhipment ALLOWED',
            'lc_transhipment NOT ALLOWED',
            'lc_port_of_loading BRISBANE, AUSTRALIA',
            'lc_port_of_loading MELBOURNE, AUSTRALIA',
            'lc_port_of_loading SYDNEY, AUSTRALIA',
            'lc_port_of_loading SANTOS, BRAZIL',
            'lc_port_of_loading DOUALA, CAMEROON',
            'lc_port_of_loading JEBEL ALI, UAE',
            'lc_port_of_loading ALEXANDRIA, EGYPT',
            'lc_port_of_loading POTI, GEORGIA',
            'lc_port_of_loading CHENNAI, INDIA',
            'lc_port_of_loading JAWAHARLAL NEHRU/NSICT, INDIA',
            'lc_port_of_loading KANDLA, INDIA',
            'lc_port_of_loading MUNDRA, INDIA',
            'lc_port_of_loading NHAVA SHEVA, INDIA',
            'lc_port_of_loading PIPAVAV, INDIA',
            'lc_port_of_loading ABIDJAN, IVORY COAST',
            'lc_port_of_loading RIGA. LATIVA',
            'lc_port_of_loading PORT KELANG, MALAYSIA',
            'lc_port_of_loading TANJUNG PELEPAS, MALAYSIA',
            'lc_port_of_loading BEIRA, MOZAMBIQUE',
            'lc_port_of_loading KARACHI, PAKISTAN',
            'lc_port_of_loading DAKAR, SENEGAL',
            'lc_port_of_loading SINGAPORE, SINGAPORE',
            'lc_port_of_loading DURBAN, SOUTH AFRICA',
            'lc_port_of_loading ALGECIRAS, SPAIN',
            'lc_port_of_loading COLOMBO, SRILANKA',
            'lc_port_of_loading GENEVA, SWITZERLAND',
            'lc_port_of_loading LAUSANNE, SWITZERLAND',
            'lc_port_of_loading LOME, TOGO',
            'lc_port_of_loading ISTANBUL, TURKEY',
            'lc_port_of_loading MERSIN, TURKEY',
            'lc_port_of_loading ILYCHEVSK, UKRAINE',
            'lc_port_of_loading SAN PEDRO, USA',
            'lc_port_of_loading SAVANNAH, USA',
            'lc_port_of_loading BANDAR ABBAS, IRAN',
            'lc_port_of_loading PETRAPOLE, INDIA',
            'lc_port_of_loading BONGAON, INDIA',
            'lc_port_of_loading ANY PORT OF ASIA',
            'lc_port_of_loading ANY PORT OF AFRICA',
            'lc_port_of_loading ANY PORT OF INDIA',
            'lc_port_of_loading ANY PORT OF GUJARAT',
            'lc_port_of_loading COTONOU, BENIN',
            'lc_port_of_loading KRISHNAPATNAM, INDIA',
            'lc_port_of_loading ANY PORT OF USA',
            'lc_port_of_loading ANY PORT OF AUSTRALIA',
            'lc_port_of_loading ANY PORT OF TURKEY',
            'lc_port_of_discharge PORT OF CHITTAGONG',
            'lc_port_of_discharge PORT OF MONGLA',
            'lc_port_of_discharge PORT OF BENAPOLE',
            'shipment_type BY SEA',
            'shipment_type BY ROAD',
            'shipment_port_of_loading BRISBANE, AUSTRALIA',
            'shipment_port_of_loading MELBOURNE, AUSTRALIA',
            'shipment_port_of_loading SYDNEY, AUSTRALIA',
            'shipment_port_of_loading SANTOS, BRAZIL',
            'shipment_port_of_loading DOUALA, CAMEROON',
            'shipment_port_of_loading JEBEL ALI, UAE',
            'shipment_port_of_loading ALEXANDRIA, EGYPT',
            'shipment_port_of_loading POTI, GEORGIA',
            'shipment_port_of_loading CHENNAI, INDIA',
            'shipment_port_of_loading JAWAHARLAL NEHRU/NSICT, INDIA',
            'shipment_port_of_loading KANDLA, INDIA',
            'shipment_port_of_loading MUNDRA, INDIA',
            'shipment_port_of_loading NHAVA SHEVA, INDIA',
            'shipment_port_of_loading PIPAVAV, INDIA',
            'shipment_port_of_loading ABIDJAN, IVORY COAST',
            'shipment_port_of_loading RIGA. LATIVA',
            'shipment_port_of_loading PORT KELANG, MALAYSIA',
            'shipment_port_of_loading TANJUNG PELEPAS, MALAYSIA',
            'shipment_port_of_loading BEIRA, MOZAMBIQUE',
            'shipment_port_of_loading KARACHI, PAKISTAN',
            'shipment_port_of_loading DAKAR, SENEGAL',
            'shipment_port_of_loading SINGAPORE, SINGAPORE',
            'shipment_port_of_loading DURBAN, SOUTH AFRICA',
            'shipment_port_of_loading ALGECIRAS, SPAIN',
            'shipment_port_of_loading COLOMBO, SRILANKA',
            'shipment_port_of_loading GENEVA, SWITZERLAND',
            'shipment_port_of_loading LAUSANNE, SWITZERLAND',
            'shipment_port_of_loading LOME, TOGO',
            'shipment_port_of_loading ISTANBUL, TURKEY',
            'shipment_port_of_loading MERSIN, TURKEY',
            'shipment_port_of_loading ILYCHEVSK, UKRAINE',
            'shipment_port_of_loading SAN PEDRO, USA',
            'shipment_port_of_loading SAVANNAH, USA',
            'shipment_port_of_loading BANDAR ABBAS, IRAN',
            'shipment_port_of_loading PETRAPOLE, INDIA',
            'shipment_port_of_loading BONGAON, INDIA',
            'shipment_port_of_loading ANY PORT OF ASIA',
            'shipment_port_of_loading ANY PORT OF AFRICA',
            'shipment_port_of_loading ANY PORT OF INDIA',
            'shipment_port_of_loading ANY PORT OF GUJARAT',
            'shipment_port_of_loading COTONOU, BENIN',
            'shipment_port_of_loading KRISHNAPATNAM, INDIA',
            'shipment_port_of_loading ANY PORT OF USA',
            'shipment_port_of_loading ANY PORT OF AUSTRALIA',
            'shipment_port_of_loading ANY PORT OF TURKEY',
            'shipment_transshipment_port PORT OF COLOMBO',
            'shipment_transshipment_port PORT OF SINGAPORE',
            'shipment_transshipment_port PORT OF KLANG',
            'shipment_transshipment_port PORT OF TANJUNG PELEPAS',
            'shipment_port_of_discharge PORT OF CHITTAGONG',
            'shipment_port_of_discharge PORT OF MONGLA',
            'shipment_port_of_discharge PORT OF BENAPOLE',
            'controller_weight_finalization_area PORT',
            'controller_weight_finalization_area MILL',
            'controller_weight_type BALES BY BALES',
            'controller_weight_type WEIGHBRIDGE',
            'controller_tear_weight_unit LBS',
            'controller_tear_weight_unit KG',
            'controller_tear_weight_unit MT',
            'controller_invoice_weight_unit LBS',
            'controller_invoice_weight_unit KG',
            'controller_invoice_weight_unit MT',
            'controller_landing_weight_unit LBS',
            'controller_landing_weight_unit KG',
            'controller_landing_weight_unit MT',
            'q_c_quality_claim_amount_unit USD',
            'q_c_quality_received_amount_unit USD',
            'debit_note_received_amount_unit USD',
            'cc_amount_unit USD',
            'lc_amendment_charge_amount_unit USD'
        ];
        foreach ($datas as $data) {
            $data = explode(' ', $data);
            $tmp_data = '';
            for ($i = 1; $i < sizeof($data); $i++) {
                $tmp_data .= $data[$i];
                $tmp_data .= " ";
            }


            \App\OptionList::create([
                'option' => $data[0],
                'list' => trim($tmp_data)
            ]);
        }

    }
}
