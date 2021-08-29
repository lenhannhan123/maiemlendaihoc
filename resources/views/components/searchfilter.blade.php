<div>
    <div class="row">
        <div class="col" style="font-weight:bold; font-size:14pt">Bộ lọc</div>
        <div class="col" style="text-align: right">
            <div id="reset">
                Thiết lập lại
            </div>
        </div>
    </div>


    <div id="group-lvht">
        <div class="row filter-row">
            <div class="col filter-btn" id="lvht" onclick="openhidden('lvht')">
                <i class="fas fa-angle-right" style="color: #2d7f98"></i>
                Lĩnh vực học tập
            </div>
        </div>


        <div id="hidden-lvht" style="display: none">
            <div class="row filter-row">
                <div class="col">
                    <input required='' type='text' id="lvht-text" name="lvht">
                    <label alt='Tìm kiếm' placeholder='Adaptive Placeholder'></label>
                </div>
            </div>
        </div>

    </div>

    <div id="group-diaddiem">
        <div class="row filter-row">
            <div class="col filter-btn" id="diaddiem" onclick="openhidden('diaddiem')">
                <i class="fas fa-angle-right" style="color: #2d7f98"></i>
                Địa điểm
            </div>
        </div>

        <div id="hidden-diaddiem" style="display: none">
            <div class="row filter-row">
                <div class="col">

                    <input required='' type='text' id="lvht-text" name="lvht">
                    <label alt='Tìm kiếm' placeholder='Adaptive Placeholder'></label>
                </div>
            </div>

            <div class="row filter-row">
                <div class="col">
                    <input type="checkbox">
                    Miền Bắc (12)
                </div>
            </div>

            <div class="row filter-row">
                <div class="col">
                    <input type="checkbox">
                    Miền Trung (12)
                </div>
            </div>

            <div class="row filter-row">
                <div class="col">
                    <input type="checkbox">
                    Miền Nam (12)
                </div>
            </div>

            <div class="row filter-row">
                <div class="col">
                    <input type="checkbox">
                    Nước ngoài (12)
                </div>
            </div>
        </div>
    </div>

    <div id="group-lbc">
        <div class="row filter-row">
            <div class="col filter-btn" id="lbc" onclick="openhidden('lbc')">
                <i class="fas fa-angle-right" style="color: #2d7f98"></i>
                Loại bằng cấp
            </div>
        </div>

        <div id="hidden-lbc" style="display: none">
            <div class="row filter-row">
                <div class="col">
                    <input type="checkbox">
                    Đại học
                </div>
            </div>
            <div class="row filter-row">
                <div class="col">
                    <input type="checkbox">
                    Cao đẳng
                </div>
            </div>


        </div>
    </div>

    <div id="group-th">
        <div class="row filter-row">
            <div class="col filter-btn" id="th" onclick="openhidden('th')">
                <i class="fas fa-angle-right" style="color: #2d7f98"></i>
                Thời hạn
            </div>
        </div>

        <div id="hidden-th" style="display: none">
            <div class="row filter-row">
                <div class="col">
                    <input type="checkbox">
                    1 Năm
                </div>
            </div>
            <div class="row filter-row">
                <div class="col">
                    <input type="checkbox">
                    2 Năm
                </div>
            </div>
        </div>
    </div>
    <div id="group-tdh">
        <div class="row filter-row">
            <div class="col filter-btn" id="tdh" onclick="openhidden('tdh')">
                <i class="fas fa-angle-right" style="color: #2d7f98"></i>
                Tiến độ học
            </div>
        </div>

        <div id="hidden-tdh" style="display: none">
            <div class="row filter-row">
                <div class="col">
                    <input type="radio">
                    Tất cả
                </div>
            </div>
            <div class="row filter-row">
                <div class="col">
                    <input type="radio">
                    Toàn thời gian
                </div>
            </div>
            <div class="row filter-row">
                <div class="col">
                    <input type="radio">
                    Bán thời gian
                </div>
            </div>

        </div>
    </div>

    <div id="group-hth">
        <div class="row filter-row">
            <div class="col filter-btn" id="hth" onclick="openhidden('hth')">
                <i class="fas fa-angle-right" style="color: #2d7f98"></i>
                Hình thức học
            </div>
        </div>
        <div id="hidden-hth" style="display: none">
            <div class="row filter-row">
                <div class="col">
                    <input type="checkbox">
                    Tại trường
                </div>
            </div>
            <div class="row filter-row">
                <div class="col">
                    <input type="checkbox">
                    Học từ xa
                </div>
            </div>

            <div class="row filter-row">
                <div class="col">
                    <input type="checkbox">
                    Hỗn hợp
                </div>
            </div>
        </div>
    </div>


</div>

<script>
    function openhidden(str) {

        switch (str) {
            case "lvht": {

                if (document.getElementById('hidden-lvht').style.display == "none") {
                    document.getElementById('hidden-lvht').style.display = 'inline';
                    document.getElementById('lvht').innerHTML =
                        `<i class="fas fa-angle-down" style="color: #2d7f98"></i>
                     Lĩnh vực học tập`
                } else {
                    document.getElementById('hidden-lvht').style.display = 'none';
                    document.getElementById('lvht').innerHTML =
                        ` <i class="fas fa-angle-right" style="color: #2d7f98"></i>
                     Lĩnh vực học tập`
                }
                break;
            }

            case "diaddiem": {

                if (document.getElementById('hidden-diaddiem').style.display == "none") {
                    document.getElementById('hidden-diaddiem').style.display = 'inline';
                    document.getElementById('diaddiem').innerHTML =
                        `<i class="fas fa-angle-down" style="color: #2d7f98"></i>
                        Địa điểm`
                } else {
                    document.getElementById('hidden-diaddiem').style.display = 'none';
                    document.getElementById('diaddiem').innerHTML =
                        ` <i class="fas fa-angle-right" style="color: #2d7f98"></i>
                        Địa điểm`
                }

                break;
            }

            case "lbc": {

                if (document.getElementById('hidden-lbc').style.display == "none") {
                    document.getElementById('hidden-lbc').style.display = 'inline';
                    document.getElementById('lbc').innerHTML =
                        `<i class="fas fa-angle-down" style="color: #2d7f98"></i>
                        Loại bằng cấp`
                } else {
                    document.getElementById('hidden-lbc').style.display = 'none';
                    document.getElementById('lbc').innerHTML =
                        ` <i class="fas fa-angle-right" style="color: #2d7f98"></i>
                        Loại bằng cấp`
                }
                break;
            }

            case "th": {

                if (document.getElementById('hidden-th').style.display == "none") {
                    document.getElementById('hidden-th').style.display = 'inline';
                    document.getElementById('th').innerHTML =
                        `<i class="fas fa-angle-down" style="color: #2d7f98"></i>
                        Thời hạn`
                } else {
                    document.getElementById('hidden-th').style.display = 'none';
                    document.getElementById('th').innerHTML =
                        ` <i class="fas fa-angle-right" style="color: #2d7f98"></i>
                        Thời hạn`
                }
                break;
            }


            case "tdh": {

                if (document.getElementById('hidden-tdh').style.display == "none") {
                    document.getElementById('hidden-tdh').style.display = 'inline';
                    document.getElementById('tdh').innerHTML =
                        `<i class="fas fa-angle-down" style="color: #2d7f98"></i>
                        Tiến độ học`
                } else {
                    document.getElementById('hidden-tdh').style.display = 'none';
                    document.getElementById('tdh').innerHTML =
                        ` <i class="fas fa-angle-right" style="color: #2d7f98"></i>
                        Tiến độ học`
                }
                break;
            }

            case "hth": {

                if (document.getElementById('hidden-hth').style.display == "none") {
                    document.getElementById('hidden-hth').style.display = 'inline';
                    document.getElementById('hth').innerHTML =
                        `<i class="fas fa-angle-down" style="color: #2d7f98"></i>
                        Hình thức học`
                } else {
                    document.getElementById('hidden-hth').style.display = 'none';
                    document.getElementById('hth').innerHTML =
                        ` <i class="fas fa-angle-right" style="color: #2d7f98"></i>
                        Hình thức học`
                }
                break;
            }




        }

    }
</script>
