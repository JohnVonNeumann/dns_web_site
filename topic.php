<?php include("header.inc"); ?>
        <main>
                <article id="topic-banner">
                        <h1> DNS - Domain Name System </h1>
                        <a> <img id="topic-image" src="images/dns_internet_phonebook.jpg" alt="DNS - Phonebook of the Internet!"> </a>
                        <h2> "The phone book of the Internet" </h2>
                </article>

                Your content should briefly and concisely explain such as:
                •What is the technology?  Its purpose / function? Major points / features ?
                •Who developed it? When? Why?
                •What groups, if any, are responsible for managing it?
                •Explain its growth or decline. Predict the future for the technology.
                •What are related technologies? Compare / contrast with other technologies.

                <section>
                        <h3> What is DNS? </h3>
                        <p> DNS is the phonebook of the internet, it allows computers to find the IP address of hostnames, or web addresses, to make it easier for humans to use the internet, without having to remember long numbers, what are known as IP addresses. It uses a hierarchical model to query for the IP of hostnames, enabling a clear way for computers to query a distributed database of IP:Hostname mappings to find out where to go to access web resources at a specific address. </p>
                </section>
                
                <section>
                        <!-- https://en.wikipedia.org/wiki/Domain_Name_System#History -->
                        <h3> Who developed DNS? When and why did they develop it? </h3>
                        <p> The original DNS was created in the ARPANET era, where an administrator would manage a <code> HOSTS.TXT </code> file. This would be updated with the various hostnames and the network addresses they lived on. This was feasible during the ARPANET days as at that point, the internet wasn't large and was mainly used by a small group of companies and Universities. This original version was created by the <strong> Stanford Research Institute/SRI </strong>, with the lead developer being a woman named <strong> Elizabeth Feinler</strong>, who maintained the original ARAPNET directory. The numerical numbers that mapped to host names was managed by <strong> Jon Postel </strong> from the <strong> University of California's Information Sciences Institute </strong>. This practice was common from 19-72 to 1989. </p>
                        <!-- https://www.w3schools.com/TAGS/tag_aside.asp -->
                        <aside>
                                <p> ARPANET was the original incarnation of the internet, before the internet became the internet, the <strong> ARPA </strong> in <strong> ARPANET </strong> stands for <strong> Advanced Research Projects Agency </strong>. </p>
                        </aside>

                        <p> In 1987 however, <i> RFC 1034 </i> and <i> RFC 1035 </i> were created, which superceded the ARPANET era DNS, and formed the common implementation of what we now know as DNS. </p>
                </section>

                <section>
                        <h3> What groups, if any, are responsible for managing DNS? </h3>
                        <p> The DNS standard is managed by the <strong> IETF </strong>, where it manages specifications via a process called <strong> RFC </strong>s. These RFCs go through a rigorous process with multiple people and organisations involved to guide the development of the protocol to ensure it is developed and planned in a hollistic manner that takes into consideration all parties. </p>
                        <aside>
                                <p> RFC stands for <strong> Request For Comments </strong>, it is a process where a person or group of engineers writes a draft proposal and it is then offered to a group to be talked over and have adjustments made to it. </p>
                        </aside>
                </section>
                
                <section>
                        <!-- https://tools.ietf.org/html/rfc1034 -->
                        <h3> RFC Numbers </h3>
                        <table>
                                <tr>
                                        <th> RFC Number </th>
                                        <th> Title </th>
                                        <th> RFC Link </th>
                                </tr>
                                <tr>
                                        <td> RFC 1034 </td>
                                        <td> Domain Names - Concepts and Facilities </td>
                                        <td> https://tools.ietf.org/html/rfc1034 </td>
                                </tr>
                                <tr>
                                        <td> RFC 1035 </td>
                                        <td> Domain Names - Implementation and Specification </td>
                                        <td> https://tools.ietf.org/html/rfc1035 </td>
                                </tr>
                                <tr>
                                        <td> RFC 1123 </td>
                                        <td> Requirements for Internet Hosts—Application and Support </td>
                                        <td> https://tools.ietf.org/html/rfc1123</td>
                                </tr>
                                <tr>
                                        <td> RFC 1995 </td>
                                        <td> Incremental Zone Transfer in DNS </td>
                                        <td> https://tools.ietf.org/html/rfc1995 </td>
                                </tr>
                                <tr>
                                        <td> RFC 1996 </td>
                                        <td> A Mechanism for Prompt Notification of Zone Changes (DNS NOTIFY) </td>
                                        <td> https://tools.ietf.org/html/rfc1996 </td>
                                </tr>
                        </table>
                </section>

                <section>
                        <!-- https://en.wikipedia.org/wiki/List_of_DNS_record_types -->
                        <h3> Common DNS Record Types </h3>
                        <ul>
                                <li> A Record </li>
                                <li> AAAA Record </li>
                                <li> TXT Record </li>
                                <li> MX Record </li>
                                <li> NS Record </li>
                        </ul>
                </section>

                <section>
                        <!-- https://www.cloudflare.com/learning/dns/dns-server-types/ -->
                        <h3> Types of DNS Servers: </h3>
                        <ol>
                                <li> Recursive resolvers </li>
                                <li> Root Nameservers </li>
                                <li> TLD Nameservers </li>
                                <li> Authoritative Nameservers </li>
                        </ol>
                </section>

        </main>
        <footer>
                <!-- TODO: replace with legit email address -->
                <p><a href="mailto:yourmum@yournan.lol.meme">yourmum@yournan.lol.meme</a></p>
        </footer>
<?php include("footer.inc"); ?>
