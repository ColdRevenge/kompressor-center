<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" ></meta>
        <title>{$setting->name|stripslashes}</title>
    </head>
    <body bgcolor="#f6f5f3">
        <table width="700" border="0" cellspacing="0" cellpadding="0" bgcolor="#ffffff" style="border: 1px solid #e8e7e5;">
            <tr>
                <td colspan="3" height="35"></td>
            </tr>
            <tr>
                <td width="35"></td>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr xmlns="">
                            <td style="padding: 7px 10px;">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="50%" rowspan="2"><a href="{$url}"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAN8AAABdCAYAAAAlgbP/AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyFpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo3ODM5MEE5OEQxRjgxMUU0QkREREUyMkUzMTI3MTAzNSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo3ODM5MEE5OUQxRjgxMUU0QkREREUyMkUzMTI3MTAzNSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjc4MzkwQTk2RDFGODExRTRCRERERTIyRTMxMjcxMDM1IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjc4MzkwQTk3RDFGODExRTRCRERERTIyRTMxMjcxMDM1Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+G9EP6gAAGwFJREFUeNrsXQmYHMV1rp7ZQxICMbJkkDCHRhIIISTQLIfAXGb2C2DCZc9yfQSInVkICUcMzBKTfDHYfDPmNjZmRyYEJzZk1waBwTFoAGGQxLEjjKToAGkkjLlizCAhQFqh7bw380pb01PdXX3tpX763jer7uqq6u731zvqVbWm6zobTPph03NBN7Ef8BTgGHAjcDPwDuDNwH8G/iPwB9f3njS4DyKkXY4aRuh9TQdOArcAHww8mUCn0T1rBMTPgEvAy2EQeBp+nwMQlkOxCGkgSBtszXebv5pvGvDfAH8deCoBDkEWtbgGteB24E+BVwA/APzItb0nbQnFI6QRDb5bmxf5VdUFwFeRphtL2s0p9ZEpip268bptJ64LRSSkEQu+25uf91rFGODvAF9G5qUftA0YO3bdd7adsDwUk5CCoMigo1/zxGOArwa+Bniyx7pEbgZOAt99x6jnD/R6j+BPRkNRC2nogS+queUI8DnAVwPHPNRjVf+JwNfdudvvx3gAHj7jQ+D366G4hTTENJ/mlucAg8bTJnqoQ4XPAz75rrEvNLm5v+t7T0I/8iKMLQEADwtFLqQhA75IRHPD44DPBZ7r8nonPBb4bGBX2u/W5kVzCMAzgP8Z/j8pFLuQhgb4QLu44COBz3NQvpe4z2V7M4H3cHpv4C+Oj2raDcBfAWbA3wS+FI6PDkUvpEGfZEf/yiGNAv4a8P425d4GfgN4I/C7wBjWRdMR5wIxiIIT8aogmAi8F6tmwygRmKmNkYbIxfBnm3i7wP8IvArOP3H1luO+CEUwBN/ggS/iGHwImmMtzv8FuAD8G+DfE/B2COcnYAAEuJWAMV2hzd2A91Tt4I/HLY42RCNnwJ8ZVj/fuDfwd4E/BH4xFMEQfIHTfXu91ECaB2n7ZR8cvb1idjrXfC0EHhm9hbIP/BPgz03KoNA/T/wqAeEIhXZ7VTp374SlTZHGyCnw5w9IW5rdw5wQfCH4AqPOSS9j/V/C0R40HJp6k8jP/BzOfQS/78PxEmmrrQpVInhnA4+XnHuPBH6+gy4+RiC9G3iGRbnNBFq7+x0dbYz8Nfx5E/BBJsU+AH4U+NlQ/ELw+U7z93kFATYhEtGOgd/TgY8GPoDMN5HQh+oBfgL4tySYVvRl4H0lxzFB+r8dAo/TM8B54B9aPI9lduD72b6vjos2RNCMvdlE42Ef3wS+59tvH3F/KHoh+Q4+EMIm0GZzKbCAWmB3i+L7ESNAf0UaY53BRxNpMqtPIcNAynpgVwINQNgBfV5GA0FcUgTN4wXAH8uu/48py/AZ7t3QEMX0tmtZNZnbeP0m4IeB77hkw9wNodiF5Dv4HjigJxqNagi425l9NNJoTl5A1/w98EpWTXI2EpqbMcOxreS/rXTbb+jzFjItmQTYWPdTl25s2Sae+M/pf0BntQm03dEUWDnVcO0XVOdS4FsvevOw50NxCykw8Gla5Egy3/Z3WQVGMe8BvgR4g4nZOU4SQHnBY79x+mKC5BT6ojngT8SDv5y5PAK+HfqvOJVwmcEU7iM/EsH2IPCTF6ya/WkoaiEFBr4Hp762B5ib3zPxyZzQcay6NOhfJdposkTzYZnVnsAX0XC6YR/D4W00kLxw8frDd87HPTx75R6RhkpQpR34KNYfwUUqkw+5gIIqW89bPqsvFLOQAgMfmGCRSET7KwqsNNoUx/Vya4HR1PsKaUnRL9RImzzOquvq7IT3feD/89D3/aHvp7Pa+bg+Mp1/BOZixdzsnrsKVyakwMzExbrHCBoYTdM/AONK+CcpONObWjZzeyheIQUOPspSSTHrjBGcCniAQPUOaRYEHe6vch7GPoSyGLS4HHgVgYvTaAO4d1BdH7rsOrZzKauufOeEUcnvo/k7ZvfmHY8csQbnFM+IRiPfgN9ZdM02AtxLwItZdb4QJ/M/O+fVGTtCsQppwMAHmqOZ/DGzGXPcngFD8E+D/7NJ1ILgP20kkOEE+b8QuDQCxL0G8OHxqCEg8gX9OqVRFCi5iv5mZL7+WyQaWdg8unGWplWCKIez6oLdPwEvYdWo6DpiHFC2nPXyQdtCUQppcDRfNUVsswkI3iPf6bHzVx7aK7m2j8rcx6rTDn8naDkE4OvAHwl+2HZB+2F7vQqmqZFQg10D/E3gPeh6DI5gdsyK0WObGujZrKBgzvt0fxg4wejq1jOXHhhquJCGBPi2k2aQEaZQLTpv+axeC+AyMh0xLex4Vk18xhOoeX4ugI9rOg6+KPleTUwt/WsKAQ7N3Ll07HfAXcBPQR/fpWPbWZj6FdKwAJ+moRZ4Cvh8Vp+AvFoAj+xa8b84V4fZLlcSwKZTUGa5SX8jBLxGC/A1ENDOAj6FzMgvCHQYIFkI/Oa5rx8SRiVDGljwed209vrekxgIrv7QrBWLGpqimCt5saHIZDIhP5P6i7WJ1TsIDBhRnEigwt3IniGTcxsBxxg0EYGHuaQ4GY+5lfOAD6M6UOuhf/kLVl31gP7butSymSHoQhq+mg/p7Tc+3Lz/QRNvb2iMTgSD8TThFGobTCJ+SAo+rS5Ggz5eiUCEmu1QAtN7ZJriBPbuBlOyjUzQw+n/e5H/uCdds5xAt4jq/zB89SGNGPDhduugRddMmzMp89kn2zaOGtt8KrhzU8hsvOGRI9ZgUvX/nPPqjHdMfD5OGNzAEP5s0piHk/YUwSfSIRQoGU1aEE3cD6gOTNpeSoGTv4SvO6QRCT4CIAYqVgIIH9rvwAlLG0Y1nBONaHNIe2Ew5clHj1yDJiSG6XFi/BNQfH1kNjYTow83lvVnjswmLVZk1bk0BOG+BKYyARIn7D8ms7LI+qcCNoevOKRdAnwCCDFS+OKCo9ZiihVmvnyVQIT+19GknTYQcLAPCFqcS8P5NtSQ06jMdvLxeLYIAuq/CGCrCWy4TOdP5A+G4X+ntMTRYmZc9ZGiv5NMr3wPAwlT7fKmV2m+9da8/WP1/EgFH2okTAPbh8y7UaRtRoGWm0h/jybt8zL5aggGTEh+fG5y6iNbPtq6J4EqQaboOAFs6NP1CRpsOQHqYzq2bOz4yjx4mTSoH4QvLlE47Y9ZizIYmGkdydhL3qj0nJAzNUcHbqNzpfbhPQ7O8/vtfr6CbwyZiQcTWDDcP5N+mxXrRW21hnyuxa8/s6F7zklTPqb/93y6aSv/SlAjBU+a6ZqtBEIE7ue7jRvFH3ECjt4ljHoiODpIE6oSJmZ30QtVefG7KqVJ4OvXOOrSZzq47Q/DmHVDg1bZPRDNwalkIn6DybdpsKK3yAdbTeDBvzGwshdpxAZdeGJjxjXzzBRk0+U2dA2+hE4LcCykvqt82itO5eOK91Uc8RDTpc80SxaKSvkgNJ3j9nU2/D6v2BBtiqLmec3hdaiZcOU57hD24sHH7PuO7Tt292ziFsATR118Yd0K9XU5AB7XrLsSZUjwnYIuPtjt68Pw06YNjc1R9Mtwmc9Em7JoEuKqhOtEbTVt7iTXyFJ8GSza1Msmz1nEZpx6HdO+vJl99Mr5bO3vLmef/BlcR11TffkZ09F0V9Z8tQNTSlHoi8Jgl7OsVQu2/adv2pAbaCfUR/BV3L47gW8xKYPzblfRw/FLozkxQdgBRz3K4sfeybQJmytG7fiWh9gMvZeteKyDfb5pgqqfl3XRfsEuYGMAN/d9MPLWPozMzoV1/m39ey0T0PKKJr4Tcte+Hrj8BQu+plGVFTr3mIAP91P5aRD2pBOasO8SpjV/UDV2iXYbW2KxfVayzz8+gSkIQ9rmfJnA0q3YpZTZYCTUN5w0XtJG03TYariBbl8fOPkLWvPxDYT49whwuuBEprCX5kDc+5b3prFxuGOKsGHD9k3j2aZ3p/L2Cx7B5wR4KmZuaTi8/FO+F8/UmHq61Lxrd21+25uc7trXB1b+AgNfQ/POtam4bg3Xz/2aVZfdqFktzu6ez9ckJeZdTgIiFOL42iUXst5Pd2NTTr65AsAvNs5gq569km0p743td9sIe8IGLEWHwGPMPrQ+5H3FU783NQFCnLXQNvI5Tp35NWme2OkKOG3fvfwNLfBFG6Oi3Y3TBBc6chnU791uyqAgAR/a98mtW/ZkqxdfUmGTkdHWb3Tp11kJznDXfJ0WMYpineA7lXFNoX3rgIp1+9pI0HzRiPgw7nbusCvdvcqUgcxPQo3URtfGJM53zgeguNFScZv7GNI+32k3TUuDMCcsBo5WO6H3SO7bN/ZhOGu+M5fu/OT4VjcVPHnCOpViGYUyZiDodmEWOgFfwWfwDQetl7HQZB2VwcONTGvKmjJjE1wxb18z+nzDGHxOL3ji+HUp1p/gmrAY/XMkiAUmm7+pLx+Un+S3lgpCkxr9yTT9qgxa4rO2HaROv3k6ap246UCkuxzo1DViuvJOdH/aH9Zmp0qh3xz3JheIrAMBcjKvVjABjRG0RsC32miuIKKSQUU6E8wY/XP2rPNKFoJuEfnVFSbMvQt72rQOF+2PaM33+DFvpBX8Na8kE1gnOZicuhwKb8JCnDRhpHZy/1mTgcdqhUSGuUsCcAT6M245KCHV3P3TNQXhuSR3aimxnFYBeLHG39YcPG/d3/b1HSMUfI/Ne6OT2c+RuaEccxfitwvSxAPoq18Z++UAgafmu+qGgUmvu54HxpKWdWiVerDf1flRlekHfaflwkz64Kp9XfcsQ0MPfAuOXpsNCHiq2RIlFyaeX+ArOfDxvGimpE/AU/WZrTJJ8PoepcGmCja+NKv6Pq0AqAfX/pm3HNSx4IY1uREDvkePXJNk6hHKPLH5+qt6vy3nk8CVDcCLBQAUvwBdNtF6fpCt1js7e3CsYvKZW2kLXbad3RnsMQJQr7MgEibA89T+WbfMKD3asXrYacCIPIKkp9GRteHC2a/MaIHfPP0ff/H/JZvrEsTMI5ck9TKfuCj8HfepTmN/Y8BJhX6AaaVrArcCdwDnxHdh135lywU/3aPauvrnYXWBZVpXD6Z9HFx8fP/K7Kvm+1XL6phC0AJHOpz8Zn163ejerjCKxRXMJKcmp5+rqcsB1FuSBHvsyrdKNKYYmOhwIKxxhTIdVHdR0GBJkoe0jV+ctrFo4rbA89h+n86GlflZBz69T1fxcXKpZTPLVF5mApVthDYWgDBz81ek9TYgVonTaQ6CIzkHgFDJD/UzUyZuY7a2wZ2WTc4VKDhmNahmTMGnD0z7IIvDCnwRicmpYmZ1C+VlXB4Ala/SRtznNmM+9Em1rpSCWerEPIrbDBp2QC/UDSxmPp14XlcCv7v2DYNZ6tZDEsPa7FSZNzl3+ayyTXm7Ub3scaQ2ix466cNgT7CrPIOFDrWpW7NTVcPmmGzurdavK7p4du7a1+tskyTI47DZfUCm+Wz54UNXxCzKJxVG9ZJHreBXHU457rFPbspm9CplvNyTzWDkxLx1G1UMrn0hyDO8NV+fUoUp7l9JymcURvyiR62lomWGempZkanNZYohfZ5G1uHYH9QDTxZgPrxTz+0ryq+MZPuDtrH+tD+Zbx976JDlnYYAZeH8/51dk8kEZVL07sR33SrRfKyo094YFpz55czlcSovchY4aXNtt0L9cZvzZWKrMjGFOpgDjtnUWXZRZ85heeQ08HrglJPrTAMhuuX0gHfw6Q7ZK/h015xAuTYc65IcE2UnIXkPZUmfkhKZLtVpvgtWzS7+4uDX7aKVCLweKMfX1PFQsMomszkfRsmSD1qqPIhaT4zQJpjzTKLa7BJVEDBTAY+Z+HCyeLB5Wffkrn0p+ALP9Swzq63xJXKA7oLx2IWr55SkGS591ZBtVuGBZZmz9KgOn4Djx5q5kmsB8dcca6dr3WS7ZJUHNPt9N4uK1yUCeC/u2q8HZqnPvdlZtpFb7m6JU0BxlXqgTzHZc5KC76K1h+V+Pv21FPMvr5GP8jmfBN0PAA+mvyd7uQVmtVOzOWUoCFGyAZ+Vfxl38F6SFgAp2DyfuIlWc9d+vZYsePD5zPrcKjzbnIKcliR+aEwG0AYLx7WNuVvWYza6530U9PIA1TEQmk8U3BamniMr9kslX7ZoUacq4KuLfM33XSk7ar9/qsBZ+yb1P3hFsezz5rl5m0FNFXxxWZmIWa0Xr59bMuQPumHM95wq5H/6FdIvD/CEuF+T/k6eWZshx9SKkwoh8ZJFICS1cx7QPBhS3e1MtxRUd5YBb19XbF8eoMkHMJVQcCFjUp/PKCuWmu+BA4puF9F2OAisDCfNF8RaQSvie9eorPdTydus1mUOHtzNrNWi/i4bkzavcD8Zi4S+TsZctF+9n9IDV/R4/T5fzIWMGJ97+dKNibIBRwmzgUgKvvv37zHbbaz0rbdaphrK+i10MZ9MvCAyXAaDcobgiiu6//JXi9+69wgrv49/8UncP9V6+xC9bsC1M3tLFQ2n+dS+MOD3eY9yxlzISNyuPPQraSa/UvDpO/SsqmkRwDJ+FQ1T8qEOv7f3SwQIwG7mz6LbnI01k2Sq3yTUa+rsdtS+bhqtVG9fqPNn7a90++DrxR3KmJJMAT5MwVfn883f55UYJfUqpdMMQgqXin8VH0Afzcrvwn4sFNLD3NadcbD+0JTnp1/OV8xPpxPfnPsErh4rVJYBqddR235tXW64APfUEVDSvKvEfQOWEiZyIdd8NkuKsvlJL6N6LqffOypH5QdD85U91uFmVFNJ5Ea/pI2ij3wDIOlzZP3zejyjv8Bq57q4yaUy5ePkftpZdW2dV03t9pPZ7fR+EqZTBqrta6xVUf5ipPHFNLA2g8aO+2AZxQxY6rSS3waZJrOhitB07v1S1oEq5gKWd3oDLgUtiGkBlWtSFqJUMJhXNc/TB7NUiTq/vbTcPn9eK1P/NLZZUM1tQK1MoPWlfcWMFllbWRvwuRmgE4CLNL3rTma9r60MfL77K+IennzHKy97bQ5UtFQWMPBCJaFvfvqH3U77dh8AEAFw2fx5TndO62b9O895IQ5Ab+2rfZ8vrgBytzJXlLzLTkVMSNfzBfmdAf5N9Bbmbt2X6ogUhNlZNHnYqteWBe3oF5WYh49w/vRvl+Qu//djcqx/Uj9tEiThVou9bKhvGc/rdt++5ingZ7dJVklxMEgolEkpge/yD+cV7/3SkoIHk0CFshb+gh9awa4OtwNMjll/FFPlRful9Yrkt3gaLO+9dDETTMjB+pquh/Z1lWdvnGIps9rpkbiHfptFaPl+RrI9keJS8JGjmA8YfEnqlJtNb1UCH0GlgnXTS3O6FX6HA39U5f5zzFm63q5OLQatatSiRVY/V6n0AZ0ryse2/iS2OGUENxyvvB84Z2y3xK0+zeiw/njc4izzbz9JK5J9ZyEmPKSCS9/C7pPNfIT1Irz8OxIZZp4ZwX0T4z2K+YmqIO7w+ExCCoj+YdOxrq+tAd+P9nhxoYXGq3yI8srNXy0K5VMSbaU6UdrK3H2eS8WktRs8WkIhDskPAjx4B9/du79g9V0GVJUtV31yXJ25BtfJyqtEsYICX4+CXzWeDfEPWIY0PAgw4frais9319gXrCaEK2ba1VuOkwqrSahXJR0qiNzKGFP7fl4IvJAGnRoowGJlJpav+ex4Uw1lkmGgMs8WBPhUtmMohK89pCEDPmYDPssa5OCzm8sK4qMWql9yDcEX0hDSfNbbysXvaH4+/k/bTigpmp1pBQ0UBPj6P9ZhbeqG4AtpCIHPfqIS/bc2Kfj6r42T5rEDXj4AAKh+TjkXvvKQhgpVop23NS2ymmIQAxXd1/aeuFOA4Tr++d6EovBjHa3M/4CHrth2i98P8NeJG0IpGhqEMtzOBniR9NKlSz36fExXSSerfM/7tqbn3C7qDAp43C+12468LZTPkIYSVRbT9umsG7iMsZOAOA/cEmAbeYtz2GYrcCmItkMKyZPZWXGGGp/le2j4STxnLuggB2rlHpPAju1GvQtavmv2Hb/Ws3p+UKAyfC8RrmFzcK4DjovljZtOiWls4paAXBMXhGBRidV+AUj8OhFfDTJV8MFjVH8n3ae470kPM98nlae3iee66JjV4tguwbUQ97NMsNq1a2K/09xiEs4XWH9CuNlzn8r683/t+mlM6CgYzE+V+10v3A9PG+RWmlg/T2YvqfQdTNK65z9vXmUZF5qruZ3bSGS2f43vG+lHJDJPnW9hAxNd5Mt9OHVQ+22qPgAASRNZAA0CL8mDTnSu8oDhuHFqI0Zta6w+UZe/bI361SUJGrXTef4C0ybgiTPzFQBph35PktlHibmwjhf6z039LnpWGp039jtNMqWx/gVHWUFQNWGQ4mVKiv3kq9O5nE2la3ss7snqfhMG4PEkfd6vbrO+A5g0YuVnX7OHCwCwCNymM308cAdxWWe2//JUFq/VgNuBCwrX+fmvhdpGzjlpvxqxqT/Gj5MA5c7s+X6lTvjl6+iM4ItbCH5OOFdg9ctcxF27SgTetERw0hb+K0/4djKAZpl1FJjvEi366zxLKElt5QXfut0QP+g21M+32XC6usPYT75Up9Uw8LZTm2mH98t37BOXaRmXHuWZjwuhpUuKOrafXBY6OOLD84/NuxHvue4YPQv8G190QSzTwU4uggkhGznNnleGGT8sWUsliTaPGYQtaxM46iThUxUQla3mExbWC59eykj6bnZfPLsp5iD4Jusn75fZp6STDu+30yRaakzUV9VsWZCPGnMYtGKrqeYLyRPFLV4O3wgpZ2Na2ZHVWsUUE9aKKfZXZZt5O+oQ7olzi8/P1Y9+2tVTZvItIRJ0P5rgcys9F8EUxWtj3N8Lwefcp0waHOeERPi7LfwM4wLYmAl4xZG9bBAOvvFQXALKDHP2+eisYvkyM5+GKitoWVlf4w60nlk/ixb+W9JEg1ndLzeHU4Z32iYMaF4WQndb+nwhWT64DAAuScDj/kFOELA0M1+gWxIEOEaRy5jEJEoa/I+8pJ42yfW8bVWBTrL+7QpVg1limwn6m+9hkjUMGkmDAGcMwZtuxb5a9bNM9Sw0DAA8CJN3cb+trPZLUSUBjAnm7vMJXF5SxgEhBJ8CgdnAp0y64EFiBGY92fAcfPxrTh+x/i1ds/SyMoKjrlMZ2Qp3vps0r7/bBMxFKiuCIcacrcxPODTjuJ/J769TAEAbCbduOCcGKVKs9tMmHT71k++E10N94OH/FgO4Ve+X308XXcO3DNHpeTt5xujz6QZ5qdF+2gB8yXNEEwVdxHkiozZTCVoZ5+pGCsnm2IKiYZdeFmq+kEIaJArBF1JIg0T/L8AANy7AEOF9JD4AAAAASUVORK5CYII=" border="0"  alt="{$setting->name|stripslashes}"></a></td>
                                        <td height="12"></td>
                                    </tr>
                                    <tr>
                                        <td width="50%" align="right"></td>
                                    </tr>
                                </table>

                            </td>
                        </tr>
                        <tr xmlns="">
                            <td height="45"></td>
                        </tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr xmlns="">
                                        <td width="48"></td>
                                        <td width="580" valign="top">
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <td>
                                                        <font size="5" face="Arial, sans-serif">Вопрос с сайта:</font>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10"></td>
                                                </tr>
                                                {*     <tr>
                                                <td><font size="3" face="Arial, sans-serif">{$smarty.post.comment}</font></td>
                                                </tr>*}
                                                <tr>
                                                    <td>
                                                        <div style="height: 5px; font-size: 0">&nbsp;</div>

                                                        {if $smarty.post.fio}<font size="2" face="Arial, sans-serif">Имя:&nbsp;<b>{$smarty.post.fio}</b></font>{/if}<div style="height: 5px; font-size: 0">&nbsp;</div>
                                                        {if $smarty.post.mail}<font size="2" face="Arial, sans-serif">E-Mail:&nbsp;<b>{$smarty.post.mail}</b></font>{/if}<div style="height: 5px; font-size: 0">&nbsp;</div>
                                                        
                                                        <div style="height: 5px; font-size: 0">&nbsp;</div>
                                                        {if $smarty.post.question}<font size="2" face="Arial, sans-serif">Вопрос:&nbsp;<br/><b>{$smarty.post.question}</b></font>{/if}
                                                        
                                                        


                                                        <p>Для ответа на вопрос войдите  <a href="{$admin_url}faq/">систему управления</a></p>


                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr xmlns="">
                                        <td colspan="2" height="48"></td>
                                    </tr>

                                    <tr xmlns=""><td colspan="2" height="21"></td></tr>
                                    <tr xmlns=""><td width="48"></td>
                                        <td width="580" valign="top">
                                            <font size="3" face="Arial, sans-serif">С уважением,<br>  <a href="{$url}" style="text-decoration: none;">
                                                        <font color="#000">Интернет магазин &nbsp;&laquo;{$shop_name}&raquo;</font></a></font>
                                        </td>
                                    </tr>
                                    <tr xmlns="">
                                        <td colspan="2" height="21"></td>
                                    </tr>
                                </table>

                            </td>
                            <td width="35"></td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
    </body>
</html>
