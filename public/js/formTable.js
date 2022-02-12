$(window).ready(() => {
    //--------------------------------------ACTIVITY PF----------------------------------------------
  
    //For dates

    var eventDate = $("#eventDate");

    //Activity Proposal Forms: Coorg Table
    let coorgName = $("#coorgName");
    let coorganizer = $("#coorganizer");
    let coorgContactNum = $("#coorgContactNum");
    let coorgEmail = $("#coorgEmail");

    $("#apfForms").on("click", "#apfCoorgAddBtn", function (e) {
        $("#coorgItems").append(
            `
           <tr>
               <td>
                   <select class="form-control" name="coorgName[]" required>
                       <option hidden>Coorganization</option>
                       <option value="Internal">Internal</option>
                       <option value="External">External</option>
                   </select>
               </td>
               <td><input type="text" class="form-control" id="coorganizer" placeholder="APC Org" name="coorganizer[]" required></td>
               <td><input type="text" class="form-control" id="coorgContact" placeholder="09123456789" maxlength="11" name="coorgContact[]" required></td>
               <td><input type="text" class="form-control" id="coorgEmail" placeholder="abc@domain.com.ph" name="coorgEmail[]" required></td>
               <td class="float-right"><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
           </tr>
           `
        );
        $(".removeBtn").on("click", function () {
            $(this).closest("tr").remove();
        });
    });

    //Activity Proposal Forms: Activity Table

    let programme = $("#programme");
    let progStartDate = $("#progStartDate");
    let progEndDate = $("#progEndDate");

    $("#apfForms").on("click", "#apfActAddBtn", function (e) {
        $("#programmeItems").append(
            `
           <tr>
               <td><input class="form-control" id="programme" type="text" name="programme[]"/></td>
               <td><input type="date" class="form-control" id="progStartDate" value="${eventDate.val()};" name="progStartDate[]" ></td>
               <td><input type="date" class="form-control" id="progEndDate" value="${eventDate.val()};" name="progEndDate[]"></td>
               <td class="float-right"><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
           </tr>
           `
        );
        $(".removeBtn").on("click", function () {
            $(this).closest("tr").remove();
        });
    });

    //Activity Proposal Forms: Logistics Table

    let service = $("#service");
    let dateNeeded = $("#dateNeeded");
    let venue = $("#venue");

    $("#apfForms").on("click", "#apfLogisticsAddBtn", function (e) {
        $("#logisticsItems").append(
        `
        <tr>
            <td><input type="text" class="form-control" id="service" name="service[]" required/></td>
            <td><input type="date" class="form-control" id="dateNeeded" name="dateNeeded[]" required/></td>
            <td><input type="text" class="form-control" id="venue" name="serviceVenue[]" required/></td>
            <td class="float-right"><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
        </tr>
        `
        );
        $(".removeBtn").on("click", function () {
            $(this).closest("tr").remove();
        });
    });

    //--------------------------------------REQUISITION----------------------------------------------

    //Requisitions

    let qty = $("#qty");
    let particulars = $("#particulars");
    let cost = $("#cost");

    $("#reqForms").on("click", "#reqAddBtn", function (e) {
        $("#reqItems").append(
            `
           <tr>
               <td><input class="form-control" name="qty[]" type="number" id="qty"/></td>
               <td><input class="form-control" name="particulars[]" type="text" id="particulars"></td>
               <td><input class="form-control" name="cost[]" type="number" step="0.01" id="cost" ></td>
               <td></td>
               <td class="float-right"><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
           </tr>
           `
        );

        getTotalCost();

        $(".removeBtn").on("click", function () {
            $(this).closest("tr").remove();
            getTotalCost();
        });
    });

    //--------------------------------------lIQUIDATION----------------------------------------------

    //Liquidation

    let dateBought = $("#datebought");
    let itemQty = $("#qty");
    let items = $("#particulars");
    let amount = $("#amount");

    $("#liqForms").on("click", "#liqAddBtn", function (e) {
        $("#liqItems").append(
            `
           <tr>
               <td><input class="form-control" id="datebought" type="date" name="datebought[]" "${eventDate.val()};" required /></td>
               <td><input class="form-control" id="qty" type="number" name="qty[]" required /></td>
               <td><input type="text" class="form-control" id="particulars" name="particulars[]" required></td>
               <td><input type="number" step="0.01"class="form-control" name="amount[]" id="amount" required></td>
               <td></td>
               <<td class="float-right"><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
           </tr>
           `
        );

        getTotalCost();

        $(".removeBtn").on("click", function () {
            $(this).closest("tr").remove();
            getTotalCost();
        });
    });

    //--------------------------------------NARRATIVE----------------------------------------------

    //Narrative Programs
    let actTitle = $("#actTitle");
    let startDate = $("#startDate");
    let endDate = $("#endDate");

    $("#narrativeForms").on("click", "#narrActAddBtn", function (e) {
        $("#programsItem").append(
            `
           <tr>
               <td><input class="form-control" id="actTitle" name="actTitle[]" required type="text"/></td>
               <td><input class="form-control w-100" id="startDate" type="date" name="targetdate" "${eventDate.val()};" name="startDate[]" required/>
               <td><input class="form-control w-100" id="endDate" type="date" name="targetdate" "${eventDate.val()};" name="endDate[]" required/></td>
               <td class="float-right"><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
           </tr>
           `
        );

        getTotalCost();

        $(".removeBtn").on("click", function () {
            $(this).closest("tr").remove();
            getTotalCost();
        });
    });

    //Narrative Participants

    let firstName = $("#firstName");
    let lastName = $("#lastName");
    let section = $("#section");
    let participatedDate = $("#participatedDate");

    $("#narrativeForms").on("click", "#participantsAddBtn", function (e) {
        $("#participantsItem").append(
            `
           <tr>
               <td><input class="form-control" id="firstName" type="text" name="firstName[]" required/></td>
               <td><input class="form-control" id="lastName" type="text" name="lastName[]" required/></td>
               <td><input class="form-control" id="section" type="text" name="section[]" required/></td>
               <td><input class="form-control w-100" id="participatedDate" type="date" name="targetdate" "${eventDate.val()};" name="participatedDate[]" required  /></td>
               <td class="float-right"><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
           </tr>
           `
        );

        getTotalCost();

        $(".removeBtn").on("click", function () {
            $(this).closest("tr").remove();
            getTotalCost();
        });
    });

    //Narrative Comments/Suggestions

    let message = $("#message");
    let type = $("#type");

    $("#narrativeForms").on("click", "#messageAddBtn", function (e) {
        $("#messageItem").append(
            `
           <tr>
               <td><input class="form-control" id="message" type="text" name="message[]" required/></td>
               <td><select class="form-control" id="type" name="type" required>
                   <option hidden>Select one</option>
                   <option>Comment</option>
                   <option>Suggestion</option>
               </select></td>
               <td class="float-right"><button class="btn removeBtn" style="color:red;"><i class="fas fa-trash"></i></button></td>
           </tr>
           `
        );
        getTotalCost();

        $(".removeBtn").on("click", function () {
            $(this).closest("tr").remove();
            getTotalCost();
        });
    });

    //--------------------------------------COMPUTE----------------------------------------------

    //For Requisition Form
    function getTotalCost() {
        let items = [];

        $(".itemCost").each(function () {
            if (this.textContent.length != 0) {
                items.push(this.textContent);
            }
        });
        $("#totalCost").html(computeTotal(items));
    }

    //For Liquidation Form
    function getTotalExpense() {
        let items = [];

        $(".itemExpense").each(function () {
            if (this.textContent.length != 0) {
                items.push(this.textContent);
            }
        });
        $("#totalExpense").html(computeTotal(itemsArray));
    }

    //Compute the sum of Items for requisition and liquidation table
    function computeTotal(items) {
        let totalCost = 0;

        for (let i = 0; i < items.length; i++) {
            let item = items[i] * 1;
            totalCost += item;
        }
        return totalCost;
    }
});
