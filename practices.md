---
title: Official Practices
layout: default
---

<table>
<tr>
    <th> Group </th>
    <th> Marshal in Charge </th>
    <th> Days </th>
    <th> Start Time </th>
    <th> End Time </th>
</tr>
{% for p in site.data.practices %}
<tr>
    <td> {{ p.group }} </td>
    <td> <a href='mailto:{{p.email}}'>{{ p.mic }}</a> </td>
    <td> {{ p.days }} </td>
    <td> {{ p.start }} </td>
    <td> {{ p.end }} </td>
{% endfor %}
</table>
