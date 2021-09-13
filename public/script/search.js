function removeAccents(str) {
    var AccentsMap = [
        "aàảãáạăằẳẵắặâầẩẫấậ",
        "AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬ",
        "dđ", "DĐ",
        "eèẻẽéẹêềểễếệ",
        "EÈẺẼÉẸÊỀỂỄẾỆ",
        "iìỉĩíị",
        "IÌỈĨÍỊ",
        "oòỏõóọôồổỗốộơờởỡớợ",
        "OÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢ",
        "uùủũúụưừửữứự",
        "UÙỦŨÚỤƯỪỬỮỨỰ",
        "yỳỷỹýỵ",
        "YỲỶỸÝỴ"
    ];
    for (var i = 0; i < AccentsMap.length; i++) {
        var re = new RegExp('[' + AccentsMap[i].substr(1) + ']', 'g');
        var char = AccentsMap[i][0];
        str = str.replace(re, char);
    }
    return str;
}

function addmajors() {
    clickk("majors-list")
    value = (document.getElementById("majors").value);
    value = value.trim().replace(/\s+/g, ' ');

    valuetolower = removeAccents(value.toLowerCase()).replace(/ +/g, "");

    i = 0;
    str1 = "";
    majors.forEach(element => {
        str = removeAccents(element["name"].toLowerCase().replace(/ +/g, ""));

        if (str.includes(valuetolower)) {

            str1 += ` <div onclick="adddata('` + element["name"] + ` ','majors')">` + element["name"] + ` </div>`
        }


        element["major"].forEach(element1 => {

            str = removeAccents(element1["name"].toLowerCase().replace(/ +/g, ""));
            if (str.includes(valuetolower) == true) {

                str1 += ` <div onclick="adddata('` + element1["name"] + ` ','majors')">` + element1["name"] + ` </div>`
            }

        });

    });


    document.getElementById("majors-list").innerHTML = "";
    document.getElementById("majors-list").innerHTML = str1;


}

function clickk(st) {

    document.getElementById(st).style.display = "inline";
}

function unclick(st) {
    setTimeout(function () { document.getElementById(st).style.display = 'none'; changevalue(); }, 170);

}
function unclick2(st) {
    setTimeout(function () { document.getElementById(st).style.display = 'none'; }, 170);

}

function adddata(st, st1) {

    document.getElementById(st1).value = st;

}

defaul = true;
Gdata = [];

function changevalue() {
    str1 = `<option value="0">Mặc định</option>`;
    value1 = document.getElementById("majors").value


    if (value1 == "") {

        defaul = true;
        Gdata = [];

        address.forEach(element => {
            str1 += `  <option value="` + element["area"] + `">` + element["area"] + ` (` + element["area_count"] + `)</option>`
        });

        document.getElementById("area").innerHTML = str1;
    } else {

        valuetolower = removeAccents(value1.toLowerCase()).replace(/ +/g, "")

        majors.forEach(element => {
            str = removeAccents(element["name"].toLowerCase().replace(/ +/g, ""));

            if (str.includes(valuetolower)) {


                groupid = element["ID_group_major"];
            }


            element["major"].forEach(element1 => {

                str = removeAccents(element1["name"].toLowerCase().replace(/ +/g, ""));
                if (str.includes(valuetolower) == true) {

                    groupid = element["ID_group_major"];
                }

            });

        });

        // alert(groupid);


        let url = `/maiemlendaihoc/public/searchadrees?group_id=` + groupid + ``;

        var request = new XMLHttpRequest();
        request.open('GET', url, false);  // `false` makes the request synchronous
        request.send(null);

        if (request.status === 200) {// That's HTTP for 'ok'

            dataschool = JSON.parse(request.responseText)

            n = dataschool.length;

            for (i = 0; i < n; i++) {
                tmp = true
                for (j = 0; j < i; j++) {
                    if (dataschool[i]["area"] == dataschool[j]["area"]) {
                        tmp = false;
                    }
                }
                count = 0;
                if (tmp == true) {
                    for (k = i; k < n; k++) {
                        if (dataschool[i]["area"] == dataschool[k]["area"]) {
                            count += 1;
                        }
                    }
                    str1 += `  <option value="` + dataschool[i]["area"] + `">` + dataschool[i]["area"] + ` (` + count + `)</option>`


                }

            }
            document.getElementById("area").innerHTML = str1;



            str2 = "";
            dataschool.forEach(element => {
                str2 += `<div onclick="adddata('` + element['name_school'] + `','nameschool')">
                            `+ element['name_school'] + ` 
                    </div>`;


            });
            document.getElementById("nameschool-list").innerHTML = "";
            document.getElementById("nameschool-list").innerHTML = str2;

            defaul = false;
            Gdata = dataschool;

        }

    }


}




function checkk() {
    nameschoolmj = [];
    if (defaul == true) {
        nameschoolmj = school;
    } else {
        nameschoolmj = Gdata;
    }

    erea = document.getElementById("area").value;

    j=0;
    tmmp=[];
    if (erea != "0") {
        for (i = 0; i < nameschoolmj.length; i++) {
            if (nameschoolmj[i]["area"] == erea) {
               tmmp[j]=nameschoolmj[i];
               j+=1;
            }
        }
        nameschoolmj=[];
        nameschoolmj=tmmp;
    }
 

    return nameschoolmj
}

function changeschool(){
    dataschool = checkk();
    str2 = "";
    dataschool.forEach(element => {
        str2 += `<div onclick="adddata('` + element['name_school'] + `','nameschool')">
                    `+ element['name_school'] + ` 
            </div>`;


    });
    document.getElementById("nameschool-list").innerHTML = "";
    document.getElementById("nameschool-list").innerHTML = str2;
}


function addnameschool(){
    dataschool = checkk();

    clickk("nameschool-list")
    value = (document.getElementById("nameschool").value);
    value = value.trim().replace(/\s+/g, ' ');

    valuetolower = removeAccents(value.toLowerCase()).replace(/ +/g, "");

    // alert(valuetolower);
    // console.log(dataschool);
    i = 0;
    str1 = "";
    dataschool.forEach(element => {
        str = removeAccents(element["name_school"].toLowerCase().replace(/ +/g, ""));
   

        if (str.includes(valuetolower)) {
            str1 += ` <div onclick="adddata('` + element["name_school"] + ` ','nameschool')">` + element["name_school"] + ` </div>`
        }

    });


    document.getElementById("nameschool-list").innerHTML = "";
    document.getElementById("nameschool-list").innerHTML = str1;

}

