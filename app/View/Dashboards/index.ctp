<table class="table table-condensed" style="border-collapse:collapse;">
    <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Description</th>
            <th>Credit</th>
            <th>Debit</th>
            <th>Balance</th>
        </tr>
    </thead>
    <tbody>
        <tr data-toggle="collapse" data-target=".demo1" class="accordion-toggle">
            <td>1</td>
            <td>Dòng 1</td>
            <td>Credit Account</td>
            <td class="text-success">$150.00</td>
            <td class="text-error"></td>
            <td class="text-success">$150.00</td>
        </tr>
        <tr>
            <td class="hiddenRow">
                <div class="accordian-body collapse demo1">dòng 1</div>
            </td>
            <td class="hiddenRow">
                <div class="accordian-body collapse demo1">dòng 2</div>
            </td>
            <td class="hiddenRow">
                <div class="accordian-body collapse demo1">dòng 3</div>
            </td>
            <td class="hiddenRow">
                <div class="accordian-body collapse demo1">dòng4</div>
            </td>
            <td class="hiddenRow">
                <div class="accordian-body collapse demo1">dòng 5</div>
            </td>
            <td class="hiddenRow">
                <div class="accordian-body collapse demo1">dòng 6</div>
            </td>
        </tr>
        <tr data-toggle="collapse" data-target="#demo2" class="accordion-toggle">
            <td>2</td>
            <td>Dòng 2</td>
            <td>Credit Account</td>
            <td class="text-success">$11.00</td>
            <td class="text-error"></td>
            <td class="text-success">$161.00</td>
        </tr>
        <tr>
            <td colspan="6" class="hiddenRow">
                <div id="demo2" class="accordian-body collapse">Demo2</div>
            </td>
        </tr>
        <tr data-toggle="collapse" data-target="#demo3" class="accordion-toggle">
            <td>3</td>
            <td>05 May 2013</td>
            <td>Credit Account</td>
            <td class="text-success">$500.00</td>
            <td class="text-error"></td>
            <td class="text-success">$661.00</td>
        </tr>
        <tr>
            <td colspan="6" class="hiddenRow">
                <div id="demo3" class="accordian-body collapse">Demo3</div>
            </td>
        </tr>
    </tbody>
</table>