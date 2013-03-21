import urllib
import json
import re

TAG_URL = 'https://api.github.com/repos/hupili/snsapi/tags'
VERSION_PATTERN = re.compile('^v\d+\.\d+(\.\d+)?$')
FN_TPL = 'index.md.tpl'
FN_MD = 'index.md'

def is_version_tag(name):
    return True if VERSION_PATTERN.search(name) else False

def render_version(t):
    space = '&nbsp;' * 4
    fmt = '   * **{0}**: %s [[zip]]({1}) %s [[tar.gz]]({2})' % (space, space)
    return fmt.format(t['name'], t['zipball_url'], t['tarball_url'])

if __name__ == '__main__':
    r = urllib.urlopen(TAG_URL)
    tags = json.loads(r.read())
    #print tags
    lst = []
    for t in sorted(tags, key=lambda t: t['name'], reverse=True):
        if is_version_tag(t['name']):
            #print t['name']
            #print render_version(t)
            lst.append(render_version(t))
    tpl = open(FN_TPL).read()
    html = tpl.replace('{{TAG_LIST}}', '\n'.join(lst))
    open(FN_MD, 'w').write(html)
