<?php

class OutputData {
    public function CreateTable($rows) {
        $html = "<table class='border w-full'>";
        $html .= "<tr>";

        foreach($rows[0] as $key => $value) {
            $html .= "<td class='p-2 font-bold border-r border-l border-collapse'>" . $key . "</td>";
        }

        $html .= "<td class='p-2 font-bold border-r border-l border-collapse'>Actions</td>";
        $html .= "</tr>";

        foreach($rows as $row) {
            $html .= "<tr>";

            $html .= "<td class='p-2 border-r border-l border-collapse'>" . $row['product_id'] . "</td>";
            $html .= "<td class='p-2 border-r border-l border-collapse'>" . $row['product_type_code'] . "</td>";
            $html .= "<td class='p-2 border-r border-l border-collapse'>" . $row['supplier_id'] . "</td>";
            $html .= "<td class='p-2 border-r border-l border-collapse'>" . $row['product_name'] . "</td>";
            $html .= "<td class='p-2 border-r border-l border-collapse'>€ " . str_replace('.', ',', $row['product_price']) . "</td>";
            $html .= "<td class='p-2 border-r border-l border-collapse'>" . $row['other_product_details'] . "</td>";

            $html .= "<td class='p-2 flex justify-between'>";
            $html .= '<a onclick="loadPage(\'?action=updateform&id=' . $row['product_id'] . '\', sendToContent)" class="cursor-pointer"><span class="material-icons material-icons-outlined">edit</span><span>Update</span></a>';
            $html .= '<a onclick="loadPage(\'?action=delete&id=' . $row['product_id'] . '\', sendToContent)" class="cursor-pointer"><span class="material-icons material-icons-outlined">delete</span><span>Delete</span></a>';
            $html .= "</td>";
            $html .= "</tr>";
        }
        $html .= "</table>";

        return $table = $html;
    }
}

?>