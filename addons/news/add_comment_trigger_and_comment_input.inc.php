<?php // add comment trigger and comment input ?>
<div>
    <div class='j-bolder j-color1 j-btn j-round'onclick="$('#cmtinp').show();">Add comment</div><br><br>
    <div id='cmtinp'style='display:none;'>
        <form id='cmtfrm'>
            <div id='inpnc'>
                <span id='name'class='mg j-text-color1'></span>
                <input type='text'id='nam'name='nam'class="ip j-input j-medium j-color4 j-round-large"placeholder='Name'maxlength='50'style="width:100%;max-width:400px;border:solid 2px color1"/><br>
            </div>
            <span id='cmte'class='mg j-text-color1'></span>
            <textarea id='cmt'name='cmt'class='ip j-input j-medium j-color4 j-round-large'placeholder='Comment'style="width:100%;max-width:400px;border:solid 2px color1"></textarea><br>
            <input type='hidden'name='nid'value='<?=($id)?>'/>
            <input type='checkbox'id='anm'name='anm'value='yes'class='j-check j-color1'OnClick="hsn(this,$('#inpnc'));"/>
            <span class='j-text-color1 j-bolder'>Anonymous</span><br><br>
            <button type='submit'id='cmtbtn'class="j-btn j-medium j-color3 j-round-large j-bolder">Submit</button><br>
            <br><br>
        </form>
    </div>
</div>