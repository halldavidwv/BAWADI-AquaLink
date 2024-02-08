<?

    $cost_of_meter_value = 2760;
    $cost_of_materials_value = 2928.30;

    $national_concrete_road_without_crossing_value = 3001.45;
    $city_barangay_concrete_road_without_crossing_value = 2582.40; 
    $national_dirt_road_without_crossing_value = 1370.61;

    $national_concrete_road_across_value = 5333.65;
    $city_barangay_concrete_road_across_value = 5595.51; 
    $national_dirt_road_across_value = 1637.84;

    $inspection_fee_residential_value = 600;
    $inspection_fee_commercial_value = 950;

    $contract_fee_residential_value = 300;
    $contract_fee_commercial_value = 500;

    $wsdf_application_within_subdivision_commercial_value = 5000;

    $guaranteed_deposit_lack_of_documents_residential_value = 2000;
    $guaranteed_deposit_lack_of_documents_commercial_value = 5000;
    $guaranteed_deposit_lot_and_building_owners_different_residential_value = 2000;
    $guaranteed_deposit_lot_and_building_owners_different_commercial_value = 2000;
    $guaranteed_deposit_applicant_tenant_lessee_commercial_value = 5000;
    $guaranteed_deposit_temporary_connection_residential_value = 2000;
    $guaranteed_deposit_temporary_connection_commercial_value = 5000;

    echo '<button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button>';
    echo '<div id="installation_bill_header" class="text-center">';
    echo '<h1>Water Installation Bill</h1><br>';
    echo '<h4>Baguio Water District</h4><br>';
    echo '<h4>Total New Connection Fees (Minimum)</h4>';
    echo '</div>';
    echo '<div id="installation_bill_content"><table id="bill_table" class="stack"><tbody>';
    echo '<tr><td colspan="2"><b>Size of Water Meter</b></td><td>½”Ø</td></tr>';
    echo '<tr><td colspan="2">Cost of Meter:</td>';
    echo '<td>PHP<input type="number" name="cost_of_meter_input" id="cost_of_meter_input" value="' . $cost_of_meter_value . '" style="width: 100px;"/></td></tr>';
    echo '<tr><td colspan="2">Cost of materials (advance):</td>';
    echo '<td>PHP<input type="number" name="cost_of_materials_input" id="cost_of_materials_input" value="' . $cost_of_materials_value . '" style="width: 100px;"/></td></tr>';
    echo '<tr><td>Installation Cost</td><td>concrete and asphalt road</td><td>dirt road</td></tr>';
    echo '<tr><td colspan="3">1m x 1m Without Crossing the Road</td></tr>';
    echo '<tr><td><li>National Road</li></td>';
    echo '<td>PHP<input type="number" name="national_concrete_road_without_crossing_input" id="national_concrete_road_without_crossing_input" value="' . $national_concrete_road_without_crossing_value . '" style="width: 100px;"/></td>';
    echo '<td rowspan="2">PHP<input type="number" name="national_dirt_road_without_crossing_input" id="national_dirt_road_without_crossing_input" value="' . $national_dirt_road_without_crossing_value . '" style="width: 100px;"/></td>';
    echo '<tr><td><li>City/Barangay Road</li></td>';
    echo '<td>PHP<input type="number" name="city_barangay_concrete_road_without_crossing_input" id="city_barangay_concrete_road_without_crossing_input" value="' . $city_barangay_concrete_road_without_crossing_value . '" style="width: 100px;"/></td></tr>';
    echo '<tr><td colspan="3">1m x 1m Across the Road using Piercing Tool</td></tr>';
    echo '<tr><td><li>National Road</li></td>';
    echo '<td>PHP<input type="number" name="v_input" id="national_concrete_road_across_input" value="' . $national_concrete_road_across_value . '" style="width: 100px;"/></td>';
    echo '<td rowspan="2">PHP<input type="number" name="national_dirt_road_across_input" id="national_dirt_road_across_input" value="' . $national_dirt_road_across_value . '" style="width: 100px;"/></td>';
    echo '<tr><td><li>City/Barangay Road</li></td>';
    echo '<td>PHP<input type="number" name="city_barangay_concrete_road_across_input" id="city_barangay_concrete_road_across_input" value="' . $city_barangay_concrete_road_across_value . '" style="width: 100px;"/></td></tr>';
    echo '<tr><td colspan="3"></td></tr>';
    echo '<tr><td>OTHERS:</td>';
    echo '<td><b>Residential</b></td>';
    echo '<td><b>Commercial</b></td>';
    echo '<tr><td>Inspection Fee, to be paid upon application (Re-inspection fee shall
            be collected for water service connection applications that lapsed the
            1-year validity):</td>';
    echo '<td>PHP<input type="number" name="inspection_fee_residential_input" id="inspection_fee_residential_input" value="' . $inspection_fee_residential_value . '" style="width: 100px;"/></td>';
    echo '<td>PHP<input type="number" name="inspection_fee_commercial_input" id="inspection_fee_commercial_input" value="' . $inspection_fee_commercial_value . '" style="width: 100px;"/></td></tr>';
    echo '<tr><td>Contract Fee:</td>';
    echo '<td>PHP<input type="number" name="contract_fee_residential_input" id="contract_fee_residential_input" value="' . $contract_fee_residential_value . '" style="width: 100px;"/></td>';
    echo '<td>PHP<input type="number" name="contract_fee_commercial_input" id="contract_fee_commercial_input" value="' . $contract_fee_commercial_value . '" style="width: 100px;"/></td></tr>';
    echo '<tr><td colspan="3">Water Source Development Fee (WSDF)</td><tr>';
    echo '<tr><td><li>For applications within subdivision</li></td>';
    echo '<td>None</td>';
    echo '<td>PHP<input type="number" name="wsdf_application_within_subdivision_commercial_input" id="wsdf_application_within_subdivision_commercial_input" value="' . $wsdf_application_within_subdivision_commercial_value . '" style="width: 100px;"/></td></tr>';
    echo '<tr><td><li>Commercial applications outside subdivision</li></td>';
    echo '<td>-</td><td>None</td></tr>';
    echo '<tr><td colspan="3">Guarantee Deposit</td></tr>';
    echo '<tr><td><li>Lack of documents on proof of ownership</li></td>';
    echo '<td>PHP<input type="number" name="guaranteed_deposit_lack_of_documents_residential_input" id="guaranteed_deposit_lack_of_documents_residential_input" value="' . $guaranteed_deposit_lack_of_documents_residential_value . '" style="width: 100px;"/></td>';
    echo '<td>PHP<input type="number" name="guaranteed_deposit_lack_of_documents_commercial_input" id="guaranteed_deposit_lack_of_documents_commercial_input" value="' . $guaranteed_deposit_lack_of_documents_commercial_value . '" style="width: 100px;"/></td></tr>';
    echo '<tr><td><li>Lot and building owners are two (2) different Person/s and the consent or written authorization cannot be secured</li></td>';
    echo '<td>None</td>';
    echo '<td>PHP<input type="number" name="guaranteed_deposit_applicant_tenant_lessee_commercial_input" id="guaranteed_deposit_applicant_tenant_lessee_commercial_input" value="' . $guaranteed_deposit_applicant_tenant_lessee_commercial_value . '" style="width: 100px;"/></td></tr>';
    echo '<tr><td><li>Temporary connection/on-going construction</li></td>';
    echo '<td>PHP<input type="number" name="guaranteed_deposit_temporary_connection_residential_input" id="guaranteed_deposit_temporary_connection_residential_input" value="' . $guaranteed_deposit_temporary_connection_residential_value . '" style="width: 100px;"/></td>';
    echo '<td>PHP<input type="number" name="guaranteed_deposit_lack_of_documents_commercial_input" id="guaranteed_deposit_temporary_connection_residential_input" value="' . $guaranteed_deposit_temporary_connection_residential_value . '" style="width: 100px;"/></td></tr></tbody></table>';
    echo '<div class="button-group align-center"><button class="submit success button" name="update" value="update">Save</button></div>';
?>