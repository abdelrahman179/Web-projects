var E = ["التجمع الخامس", "مدينة نصر", "مصر الجديدة", "الرحاب", "العبور", "مدينة بدر", "عين شمس", "شبرا", "المطرية", "الشروق", "العاشر من رمضان", "وسط البلد", "العباسية", "المعادي", "الزمالك", "المنيل", "حدائق القبة", "المقطم", "القطامية", "حلوان", "مدينتي", "حدائق المعادي", "المرج", "مصر القديمة", "دار السلام", ];
var F = ["اكتوبر", "الهرم", "فيصل", "الشيخ زايد", "العجوزة", "حدائق الاهرام", "الحوامدية", "امبابة", "العياط", "بولاق الدكرور", "الدقي", "المهندسين", "البدرشين"];
var G = ["مدينة بورسعيد", "بور فؤاد"];
var H = ["ميامي", "محرم بك", "كليوباترا", "سان ستيفانو", "جليم", "فلمنج", "سيدي بشر", "ستانلي", "الورديان", "المنشية", "المندرة", "المنتزة", "العجمي", "العامرية", "العصافرة", "العامرية", "السيوف", "الأزاريطة", "أبو قير", "جانكليس", "الابراهيمية", "لوران", "سبورتينج", "سيدي جابر", "سموحة", "محطة الرمل"];
var I = ["بلبيس", "أبو حماد", "منيا القمح", "الزقازيق", "فاقوس"];
var J = ["اشمون", "شبين الكوم", "مدينة السادات", "بركة السبع"];
var K = ["ابشواي", "مدينة الفيوم"];
var L = ["مركز بنها", "سبين القناطر", "قليوب"];
var M = ["طنطا", "كفر الزيات", "المحلة الكبري"];
var N = ["دمنهور", "كفر الدوار"];
var O = ["دمياط الجديدة", "مدينة دمياط"];
var P = ["اسنا", "مدينة الاقصر"];
var Q = ["مدينة الغردقة"];
var R = ["مدينة شرم الشيخ"];
var S = ["مدينة نويبع"];
var T = ["مدينة اسيوط"];
var U = ["مدينة اسوان"];
var V = ["مدينة بني سويف"];



var changeCity = function changeCity(firstList) {
    var newSel = document.getElementById("district");
    //if you want to remove this default option use newSel.innerHTML=""
    newSel.innerHTML = "<option value=\"\">المنطقة</option>"; // to reset the second list everytime
    var opt;

    //test according to the selected value
    switch (firstList.options[firstList.selectedIndex].value) {
        case "القاهرة":
            for (var i = 0; len = E.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = E[i];
                opt.text = E[i];
                newSel.appendChild(opt);
            }
            break;
        case "الجيزة":
            for (var i = 0; len = F.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = F[i];
                opt.text = F[i];
                newSel.appendChild(opt);
            }
            break;
        case "بورسعيد":
            for (var i = 0; len = G.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = G[i];
                opt.text = G[i];
                newSel.appendChild(opt);
            }
            break;
        case "الاسكندرية":
            for (var i = 0; len = H.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = H[i];
                opt.text = H[i];
                newSel.appendChild(opt);
            }
            break;
        case "الشرقية":
            for (var i = 0; len = I.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = I[i];
                opt.text = I[i];
                newSel.appendChild(opt);
            }
            break;
        case "المنوفية":
            for (var i = 0; len = J.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = J[i];
                opt.text = J[i];
                newSel.appendChild(opt);
            }
            break;
        case "الفيوم":
            for (var i = 0; len = K.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = K[i];
                opt.text = K[i];
                newSel.appendChild(opt);
            }
            break;
        case "القليوبية":
            for (var i = 0; len = L.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = L[i];
                opt.text = L[i];
                newSel.appendChild(opt);
            }
            break;
        case "الغربية":
            for (var i = 0; len = M.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = M[i];
                opt.text = M[i];
                newSel.appendChild(opt);
            }
            break;
        case "البحيرة":
            for (var i = 0; len = N.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = N[i];
                opt.text = N[i];
                newSel.appendChild(opt);
            }
            break;
        case "دمياط":
            for (var i = 0; len = O.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = O[i];
                opt.text = O[i];
                newSel.appendChild(opt);
            }
            break;
        case "الاقصر":
            for (var i = 0; len = P.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = P[i];
                opt.text = P[i];
                newSel.appendChild(opt);
            }
            break;
        case "الغردقة":
            for (var i = 0; len = Q.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = Q[i];
                opt.text = Q[i];
                newSel.appendChild(opt);
            }
            break;
        case "شرم الشيخ":
            for (var i = 0; len = R.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = R[i];
                opt.text = R[i];
                newSel.appendChild(opt);
            }
            break;
        case "نوبيع":
            for (var i = 0; len = S.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = S[i];
                opt.text = S[i];
                newSel.appendChild(opt);
            }
            break;
        case "اسيوط":
            for (var i = 0; len = T.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = T[i];
                opt.text = T[i];
                newSel.appendChild(opt);
            }
            break;
        case "اسوان":
            for (var i = 0; len = U.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = U[i];
                opt.text = U[i];
                newSel.appendChild(opt);
            }
            break;
        case "بني سويف":
            for (var i = 0; len = V.length, i < len; i++) {
                opt = document.createElement("option");
                opt.value = V[i];
                opt.text = V[i];
                newSel.appendChild(opt);
            }
            break;
    }
}