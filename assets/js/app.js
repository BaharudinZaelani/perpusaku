// string to html
function stringToHtml(str) {
    const parser = new DOMParser;
    const doc = parser.parseFromString(str, 'text/html');
    let dumpTag = doc.body;
    // body remove
    let result = dumpTag.getElementsByTagName("a")[0];
    return result;
}