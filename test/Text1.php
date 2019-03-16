<?php
include "../Text.php";
# Text1.php

# isdigit, isalpha などの確認
print(Text\bool2str(Text\isdigit('0')). "\n");  # TRUE
print(Text\bool2str(Text\isdigit('a')). "\n");  # FALSE
print(Text\bool2str(Text\isalpha('0')). "\n");  # FALSE
print(Text\bool2str(Text\isalpha('a')). "\n");  # TRUE  
print(Text\bool2str(Text\isdelim('0')). "\n");  # FALSE
print(Text\bool2str(Text\isdelim('/')). "\n");  # TRUE
print(Text\bool2str(Text\isprint('0')). "\n");  # FALSE
print(Text\bool2str(Text\isprint(chr(0))). "\n");  # TRUE

# tolower, toupper の確認
print(Text\tolower('aBcD'). "\n");  # abcd
print(Text\toupper('aBcD'). "\n");  # ABCD

print("Done\n");
?>
